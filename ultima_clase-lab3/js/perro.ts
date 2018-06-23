namespace animales {
    export class Perro extends Animal {
        sexo: string;
        public constructor(nombre: string, sexo: string) {
            super(nombre);
            this.sexo = sexo;

        }
    }
}