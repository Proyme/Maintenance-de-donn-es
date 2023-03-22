class VueListeTrain{
  constructor(){
    this.html = document.getElementById("html-vue-liste-train").innerHTML;
    this.listeTrainDonnee = null;
  }

  initialiserListeTrain(listeTrainDonnee){
    this.listeTrainDonnee = listeTrainDonnee;
  }

  afficher(){
    document.getElementsByTagName("body")[0].innerHTML = this.html;

    let listeTrain = document.getElementById("liste-train");
    const listeTrainItemHTML = listeTrain.innerHTML;
    let listeTrainHTMLRemplacement = "";

    for(var numeroTrain in this.listeTrainDonnee){
      let listeTrainItemHTMLRemplacement = listeTrainItemHTML;
      listeTrainItemHTMLRemplacement = listeTrainItemHTMLRemplacement.replace("{Train.id}",this.listeTrainDonnee[numeroTrain].id);
      listeTrainItemHTMLRemplacement = listeTrainItemHTMLRemplacement.replace("{Train.nom}",this.listeTrainDonnee[numeroTrain].nom);
      listeTrainHTMLRemplacement += listeTrainItemHTMLRemplacement;
    }

    listeTrain.innerHTML = listeTrainHTMLRemplacement;
  }

}
