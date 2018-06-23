/*una forma de importar archivos
/// <reference path="Animal.ts" />
/// <reference path="Perro.ts" />
/// <reference path="Gato.ts" />
*/
var animales;
(function (animales) {
    var lista = new Array();
    function CrearPerro() {
        var perro = new Perro("Bobi", "macho");
        lista.push(perro);
    }
    function CrearGato() {
        var gato = new Gato("Mishifus", "siames");
        lista.push(gato);
    }
    function CrearAnimal() {
        var animal = new Animal("chaja");
        lista.push(animal);
    }
})(animales || (animales = {}));
