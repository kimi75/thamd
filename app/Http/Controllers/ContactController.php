<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ContactController extends Controller
{
    public function sendContactMail(Request $request)
    {
        // Validation des champs du formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'pickup' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'datetime' => 'required|date',
            'vehicle_type' => 'required|string|max:50',
            'message' => 'nullable|string|max:1000',
        ]);

        // Récupération des données du formulaire
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $pickup = $request->input('pickup');
        $destination = $request->input('destination');
        $datetime = $request->input('datetime');
        $vehicle_type = $request->input('vehicle_type');
        $message = $request->input('message');

        // Construction du message de l'email
        $to = 'contact@am-drive.com'; // Remplacez par votre adresse email de réception
        $subject = 'Nouvelle demande de transport VIP';
        $body = "
        <h2>Nouvelle demande de transport VIP</h2>
        <p><strong>Nom complet :</strong> $name</p>
        <p><strong>Email :</strong> $email</p>
        <p><strong>Téléphone :</strong> $phone</p>
        <p><strong>Adresse de départ :</strong> $pickup</p>
        <p><strong>Adresse de destination :</strong> $destination</p>
        <p><strong>Date et heure de prise en charge :</strong> $datetime</p>
        <p><strong>Type de véhicule :</strong> $vehicle_type</p>
        <p><strong>Message / Demandes spéciales :</strong><br> $message</p>
        ";

        // En-têtes de l'email
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        // Utilisation de la fonction mail() de PHP
        if (mail($to, $subject, $body, $headers)) {
            return redirect()->back()->with('success', 'Votre demande a été envoyée avec succès.');
        } else {
            return redirect()->back()->with('error', 'Erreur lors de l\'envoi de l\'email. Veuillez réessayer plus tard.');
        }
    }
}
