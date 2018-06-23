/*una forma de importar archivos
/// <reference path="Animal.ts" />
/// <reference path="Perro.ts" />
/// <reference path="Gato.ts" />
*/
namespace animales {

        var lista:Array<Animal> = new Array<Animal>();

        export function CrearPerro() {
            let perro: Perro = new Perro("Bobi", "macho");            
            lista.push(perro);
        }
        export function CrearGato() {
            let gato: Gato = new Gato("Mishifus", "siames");
            lista.push(gato);
        }
        function CrearAnimal() {
            let animal: Animal = new Animal("chaja");
            lista.push(animal);
        }
    
}
