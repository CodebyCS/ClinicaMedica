<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Doctor;
use App\Medication;
use App\Patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::with(['doctor.specialty', 'patient'])
            ->orderByDesc('appointment_date')
            ->get();

        return view('appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('appointments.create', $this->formData());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $this->validatedData($request);

        // medications não pertence à tabela appointments.
        // Por isso removemos esse campo antes de criar a consulta.
        $appointment = Appointment::create(
            Arr::except($validated, 'medications')
        );

        // Guarda os medicamentos na tabela pivot appointment_medication.
        $appointment->medications()->sync(
            $validated['medications'] ?? []
        );

        return redirect()
            ->route('appointments.index')
            ->with('success', 'Consulta criada com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        $appointment->load([
            'doctor.specialty',
            'patient',
            'medications.laboratory',
        ]);

        return view('appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        // Necessário para marcar os medicamentos já escolhidos.
        $appointment->load('medications');

        return view('appointments.edit', array_merge(
            compact('appointment'),
            $this->formData()
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        $validated = $this->validatedData($request);

        $appointment->update(
            Arr::except($validated, 'medications')
        );

        // sync remove os antigos e guarda os atualmente selecionados.
        $appointment->medications()->sync(
            $validated['medications'] ?? []
        );

        return redirect()
            ->route('appointments.index')
            ->with('success', 'Consulta atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()
            ->route('appointments.index')
            ->with('success', 'Consulta removida com sucesso.');
    }

    // Dados usados pelos formulários criar e editar.
    private function formData()
    {
        return [
            'doctors' => Doctor::with('specialty')->orderBy('name')->get(),
            'patients' => Patient::orderBy('name')->get(),
            'medications' => Medication::with('laboratory')->orderBy('name')->get(),
        ];
    }

    // Regras usadas tanto ao criar como ao editar.
    private function validatedData(Request $request)
    {
        return $request->validate([
            'appointment_date' => 'required|date',
            'clinical_notes' => 'nullable|string',
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
            'medications' => 'nullable|array',
            'medications.*' => 'exists:medications,id',
        ]);
    }
}
