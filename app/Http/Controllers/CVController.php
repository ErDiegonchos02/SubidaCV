<?php

namespace App\Http\Controllers;

use App\Models\CV;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CVController extends Controller
{
    public function showForm()
    {
        $cv = CV::where('user_id', Auth::id())->first();
        return view('cv.form', compact('cv'));
    }

    public function upload(Request $request)
    {
        $request->validate([
    'cv' => [
        'required',
        'file',
        'mimes:pdf',
        'max:2048', // 2MB
        'mimetypes:application/pdf',
    ],
]);


        $file = $request->file('cv');

        $existing = CV::where('user_id', Auth::id())->first();
        if ($existing && Storage::disk('cvs')->exists($existing->nombre_archivo)) {
            Storage::disk('cvs')->delete($existing->nombre_archivo);
        }

        $path = $file->storeAs(
    '',
    uniqid('cv_', true) . '.pdf',
    'cvs'
);


        CV::updateOrCreate(
            ['user_id' => Auth::id()],
            ['nombre_archivo' => $path]
        );

        return back()->with('success', 'CV subido correctamente.');
    }

    public function download()
    {
        $cv = CV::where('user_id', Auth::id())->firstOrFail();

        if (!Storage::disk('cvs')->exists($cv->nombre_archivo)) {
            abort(404);
        }

        return response()->file(
            Storage::disk('cvs')->path($cv->nombre_archivo)
        );
    }

    public function delete()
{
    $cv = CV::where('user_id', Auth::id())->first();

    if ($cv) {
        // Eliminar archivo físico si existe
        if (Storage::disk('cvs')->exists($cv->nombre_archivo)) {
            Storage::disk('cvs')->delete($cv->nombre_archivo);
        }

        // Eliminar registro de la BD
        $cv->delete();
    }

    return back()->with('success', 'Tu CV ha sido eliminado correctamente.');
}

}
