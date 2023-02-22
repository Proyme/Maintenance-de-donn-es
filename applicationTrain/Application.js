class Application {
  constructor(window, vueListeTrain, vueTrain, trainDAO){

    this.window = window;

    this.trainDAO = trainDAO;

    this.vueListeTrain = vueListeTrain;

    this.vueTrain = vueTrain;

    // C'est l'équivalent de function(){this.naviguer()}
    this.window.addEventListener("hashchange", () =>this.naviguer());

    this.naviguer();
  }

  naviguer(){
    let hash = window.location.hash;

    if(!hash){
	  
      this.vueListeTrain.initialiserListeTrain(this.trainDAO.lister());
      this.vueListeTrain.afficher();

    }else{

      let navigation = hash.match(/^#train\/([0-9]+)/);
      let idTrain = navigation[1];

      let train = this.trainDAO.chercher(parseInt(idTrain));
      this.vueTrain.initialiserTrain(train);
      this.vueTrain.afficher();

    }
  }

}

new Application(window, new VueListeTrain(), new VueTrain(), new TrainDAO);