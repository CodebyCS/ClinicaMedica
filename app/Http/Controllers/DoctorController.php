<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Specialty;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Mostra todos os médicos
    public function index()
    {
        // with evita uma consulta adicional para cada médico.
        $doctors = Doctor::with('specialty')
            ->orderBy('name')
            ->get();

        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Mostra o formulário para criar um médico.
    public function create()
    {
        // As especialidades são necessárias para o <select>.
        $specialties = Specialty::orderBy('name')->get();

        return view('doctors.create', compact('specialties'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // Guarda o médico criado pelo formulário.
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'license_number' => 'required|string|max:255|unique:doctors,license_number',
            'specialty_id' => 'required|exists:specialties,id',
        ]);

        Doctor::create($validated);

        return redirect()
            ->route('doctors.index')
            ->with('success', 'Médico criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    // Mostra os dados de um médico.
    public function show(Doctor $doctor)
    {
        $doctor->load('specialty', 'appointments.patient');

        return view('doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    // Mostra o formulário preenchido para edição.
    public function edit(Doctor $doctor)
    {
        $specialties = Specialty::orderBy('name')->get();

        return view('doctors.edit', compact('doctor', 'specialties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    // Atualiza o médico.
    public function update(Request $request, Doctor $doctor)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',

            // O último valor permite manter a cédula deste médico.
            'license_number' => 'required|string|max:255|unique:doctors,license_number,' . $doctor->id,

            'specialty_id' => 'required|exists:specialties,id',
        ]);

        $doctor->update($validated);

        return redirect()
            ->route('doctors.index')
            ->with('success', 'Médico atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    // Apaga o médico.
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        return redirect()
            ->route('doctors.index')
            ->with('success', 'Médico removido com sucesso.');
    }
}
