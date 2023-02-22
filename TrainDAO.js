class TrainDAO{
	constructor(){
		let listeTrainMemoire = [new Train("Thomas", "Thomas ! Best train ever #leader", "La légende raconte qu'il peut atteindre 666 km/h en 42 sec.","Bleu","666km/h","4 roues","France", 0),
									   new Train("Olive", "Olive LPB", "Il brille tellement que le soleil lui même s'en retrouve ébloui !","Vert brillant","223km/h","4 roues","Amazonie", 1),
									   new Train("Mystère", "Bob Ross... Il peint !", "Euh ça n'est pas un train, mais il peignait vachement bien...","Rainbow","∞","un seul... (blague douteuse)","Space", 2)]
		
		localStorage['train'] = JSON.stringify(listeTrainMemoire);
		this.listeTrain = [];
								
	}
	
	lister(){
		this.listeTrain = [];
		let listeTrainMemoire = [];
		
		if(localStorage['train']){
			listeTrainMemoire = JSON.parse(localStorage['train']);
		}
		
		for(let position in listeTrainMemoire){
			let train = new Train(listeTrainMemoire[position].nom,
											listeTrainMemoire[position].role,
											listeTrainMemoire[position].description,
											listeTrainMemoire[position].couleur,
											listeTrainMemoire[position].vitesse,
											listeTrainMemoire[position].nombreRoue,
											listeTrainMemoire[position].localisation,
											listeTrainMemoire[position].id);
			
			this.listeTrain.push(train);
		}
		
		return this.listeTrain;
	}
	
	chercher(id){
		this.lister();
		return this.listeTrain.find(train => train.id === id);
	}
}