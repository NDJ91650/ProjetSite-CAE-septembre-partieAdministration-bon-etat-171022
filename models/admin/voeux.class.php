<?php
class Voeux{
    private $id_voeux;
    private $academie_souhaite;
    private $choix1;
    private $choix2;
    private $choix3;
    private $choix4;
    private $choix5;
    private $choix6;
    private $choix7;
    private $choix8;
    private $type_contrat_souhaite;
    private $nb_heures_souhaite;
    private $motif_demande;
    private $autre_motif;
    private $justificatif_motif;
    private $id_mutation;

    public function getId_voeux()
    {
        return $this->id_voeux;
    }
    public function setId_voeux($id_voeux)
    {
        $this->id_voeux = $id_voeux;
    }

    public function getAcademie_souhaite()
    {
        return $this->academie_souhaite;
    }
    public function setAcademie_souhaite($academie_souhaite)
    {
        $this->academie_souhaite = $academie_souhaite;
    }

    public function getChoix1()
    {
        return $this->choix1;
    }
    public function setChoix1($choix1)
    {
        $this->choix1 = $choix1;
    }

    public function getChoix2()
    {
        return $this->choix2;
    }
    public function setChoix2($choix2)
    {
        $this->choix2 = $choix2;
    }

    public function getChoix3()
    {
        return $this->choix3;
    }
    public function setChoix3($choix3)
    {
        $this->choix3 = $choix3;
    }

    public function getChoix4()
    {
        return $this->choix4;
    }
    public function setChoix4($choix4)
    {
        $this->choix4 = $choix4;
    }

    public function getChoix5()
    {
        return $this->choix5;
    }
    public function setChoix5($choix5)
    {
        $this->choix5 = $choix5;
    }

    public function getChoix6()
    {
        return $this->choix6;
    }
    public function setChoix6($choix6)
    {
        $this->choix6 = $choix6;
    }

    public function getChoix7()
    {
        return $this->choix7;
    }
    public function setChoix7($choix7)
    {
        $this->choix7 = $choix7;
    }
    public function getChoix8()
    {
        return $this->choix8;
    }
    public function setChoix8($choix8)
    {
        $this->choix8 = $choix8;
    }

    public function getType_contrat_souhaite()
    {
        return $this->type_contrat_souhaite;
    }
    public function setType_contrat_souhaite($type_contrat_souhaite)
    {
        $this->type_contrat_souhaite = $type_contrat_souhaite;
    }

    public function getNb_heures_souhaite()
    {
        return $this->nb_heures_souhaite;
    }
    public function setNb_heures_souhaite($nb_heures_souhaite)
    {
        $this->nb_heures_souhaite = $nb_heures_souhaite;
    }

    public function getMotif_demande()
    {
        return $this->motif_demande;
    }
    public function setMotif_demande($motif_demande)
    {
        $this->motif_demande = $motif_demande;
    }


    public function getAutre_motif()
    {
        return $this->autre_motif;
    }
    public function set_Autre_motif($autre_motif)
    {
        $this->autre_motif = $autre_motif;
    }


    public function getJustificatif_motif()
    {
        return $this->justificatif_motif;
    }
    public function set_Justificatif_motif($justificatif_motif)
    {
        $this->justificatif_motif = $justificatif_motif;
    }

    public function get_Id_mutation()
    {
        return $this->id_mutation;
    }
    public function set_Id_mutation($id_mutation)
    {
        $this->id_mutation = $id_mutation;
    }

  



}
