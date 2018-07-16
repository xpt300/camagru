navigator.getUserMedia (
    {
        vidéo : true
    },
    Fonction de rappel de réussite ( flux ) {
        video.src = fenêtre .URL.createObjectURL (stream);
        video.play ();
    },
    Fonction erreur{
        console .error (err);
    }
)
