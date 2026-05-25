<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // On récupère proprement l'ID de l'utilisateur en cours de modification
    // $userId = is_object($this->user) ? $this->user->id : $this->route('user');

        return [

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',  Rule::unique('users')->ignore($this->user) ],
            'password' => ['required', Password::defaults(), 'confirmed'],
            'telephone' => ['required', 'numeric', 'digits_between:8,15'],
            'roles' => ['nullable', 'string'],
        ];
    }


    //message d'erreur

    public function messages(): array
    {
       return [
        // Les champs obligatoires oubliés
        'name.required'        => 'Le nom est obligatoire.',
        'email.required'      => 'L\'adresse email est obligatoire.',
        'password.required' => 'Le mot de passe est obligatoire.',
        'role.required'       => 'Vous devez choisir un rôle (admin ou locataire).',
        'telephone.required'  => 'Le numéro de téléphone est obligatoire.',

        // Les erreurs de saisie fréquentes
        'email.email'          => 'L\'adresse email doit être une adresse valide (ex: exemple@mail.com).',
        'email.unique'         => 'Cette adresse email est déjà utilisée par un autre compte.',
        'password.confirmed' => 'Les deux mots de passe ne correspondent pas.',
        'password.min'       => 'Le mot de passe doit contenir au moins 8 caractères.',
        'telephone.min'        => 'Le numéro de téléphone doit contenir au moins 8 caractères.',
    ];
    }
}
