<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $objet = htmlspecialchars($_POST['objet']);
    $message = htmlspecialchars($_POST['message']);

    $to = "moustaphand1502@gmail.com"; // Remplacez par votre adresse e-mail
    $subject = "Nouveau message de votre formulaire de contact";
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $body = "<h2>Formulaire de Contact</h2>";
    $body .= "<p><strong>Nom :</strong> {$nom}</p>";
    $body .= "<p><strong>Email :</strong> {$email}</p>";
    $body .= "<p><strong>Téléphone :</strong> {$telephone}</p>";
    $body .= "<p><strong>Objet :</strong> {$objet}</p>";
    $body .= "<p><strong>Message :</strong><br>" . nl2br($message) . "</p>";

    if (mail($to, $subject, $body, $headers)) {
        echo "Votre message a été envoyé avec succès.";
    } else {
        echo "Une erreur s'est produite lors de l'envoi du message.";
    }
} else {
    echo "Méthode de requête non valide.";
}
?>
