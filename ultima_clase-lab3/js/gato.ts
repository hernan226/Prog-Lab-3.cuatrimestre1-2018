namespace animales {
    export class Gato extends Animal {
        raza: string;
        public constructor(nombre: string, raza: string) {
            super(nombre);
            this.raza = raza;
        }
    }
    
}