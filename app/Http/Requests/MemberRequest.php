<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom' =>'required|string|max:25|min:3',
            'prenoms' =>'required|string|min:3|max:40',
            'contact' =>'required|string|min:8|max:11|unique:members',
            'dateEntrer' =>'required|date|max:255',
            'age' =>'required|integer|before:today',
            'sexe' =>'required|in:M,F',
            'voix' => 'required|string|in:Soprano,Alto,Ténor,Basse',

        ];
    }

    public function messages() {
        return [
            'nom.required' => 'Le nom du membre est requis.',
            'nom.min' => 'Le nom du membre doit contenire au moin 3 lettres.',
            'prenoms.min' => 'Le prénoms du membre doit contenire au moin 3 lettres.',
            'nom.max' => 'Le nom du membre ne doit pas dépassé 25 lettres.',
            'prenoms.max' => 'Le prénoms du membre ne doit pas dépassé 40 lettres.',
            'contact.required' => 'Le numéro de contact est requis.',
            'contact.min' => 'Le numéro de contact doit contenir au moin 8 chiffres.',
            'contact.max' => 'Le numéro de contact ne doit pas dépasser 11 chiffres.',
            'contact.unique' => 'Ce numéro de contact est déjà utilisé.',
            'dateEntrer.required' => 'La date d\'entrée est requise.',
            'dateEntrer.date' => 'La date d\'entrée doit être une date valide.',
            'age.required' => 'L\'âge est requis.',
            'age.integer' => 'L\'âge doit être un nombre entier.',
            'age.before' => 'L\'âge du membre doit être antérieur à la date actuelle.',
            'sexe.required' => 'Le sexe est requis.',
        ];
    }
}
