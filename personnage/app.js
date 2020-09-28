const cors = function(req, res){
    res.header('Access-Control-Allow-Origin', 'D:/Projet-Fil-Rouge/personnage/moine.png');
}

// objet qui contient la configuration du jeu
//creation du canva largeur + hauteur + prssentation phaser 
const config = {
    width : 500,
    height : 300,
    type : Phaser.AUTO,
    physics:{//données physique du jeu
        default:'arcade',
        arcade:{// gravité
            gravity: {y: 450}
        }
    },
    scene : {
        preload:preload,
        create:create,
        update:update
    }
}



//creation du jeu avec phaser 
var game = new Phaser.Game(config);
let moine;
let cursors;

function preload(){
    //charger l'image dans le jeu
    this.load.image('moine', 'moine.png');
}

function create(){
    //ajouter l'image sur le canva et dans le jeu (avec la gravité)
    moine = this.physics.add.image(200,200, 'moine');
    moine.body.collideWorldBounds = true ;// pour faire réagir l'omage dans notre monde 

    cursors = this.input.keyboard.createCursorKeys()//pour verifier que les touches sont activées
    console.log(cursors)
}

function update(){

    moine.setVelocityX(0)// pour arreter le mouvement 

    if(cursors.up.isDown){
        moine.setVelocity(0, -300)// pour faire sauté le personnage console.log('touch appuyé')
    }
    if(cursors.right.isDown){
        moine.setVelocity(300, 0)// pour faire allé le personnage vers la droite 
    }
    if(cursors.left.isDown){
        moine.setVelocity(-300, 0)// pour faire allé le personnage vers la gauche

    }
}
