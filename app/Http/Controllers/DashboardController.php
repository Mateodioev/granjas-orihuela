<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use App\Models\Empleado;
use App\Models\Sede;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show(Request $request)
    {
        $user = $request->user();
        $sedeID = $request->get('sede_id');
        /** @var Empleado $empleado */
        $empleado = $request->get('empleado');

        if (!$sedeID) {
            return redirect()->route('dashboard', [
                'sede_id' => $empleado->sede_id,
            ]);
        }

        $sede = Sede::find($sedeID);
        if (!Gate::allows('acceder', $sede)) {
            abort(403, 'No tienes acceso a esta sede');
        }

        return view('dashboard.main', [
            'sede' => $sede,
        ]);
    }
}
