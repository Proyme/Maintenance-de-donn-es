class VueTrain{
  constructor(){
    this.html = document.getElementById("html-vue-train").innerHTML;
    this.train = null;
  }

  initialiserTrain(train){
    this.train = train;
  }

  afficher(){
    document.getElementsByTagName("body")[0].innerHTML = this.html;
    document.getElementById("train-nom").innerHTML = this.train.nom;
    document.getElementById("train-role").innerHTML = this.train.role;
    document.getElementById("train-description").innerHTML = this.train.description;
    document.getElementById("train-couleur").innerHTML = this.train.couleur;
    document.getElementById("train-vitesse").innerHTML = this.train.vitesse;
    document.getElementById("train-nombreRoue").innerHTML = this.train.nombreRoue;
    document.getElementById("train-localisation").innerHTML = this.train.localisation;
  }

}
