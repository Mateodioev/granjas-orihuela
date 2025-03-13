<?php

namespace App\View\Components;

use App\Models\Empleado;
use App\Models\Sede;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DashboardSede extends Component
{
    public $sedes;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public Sede $sede,
    ) {
        $this->sedes = Sede::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard-sede', [
            'sede' => $this->sede,
            'sedes' => $this->sedes,
        ]);
    }
}
