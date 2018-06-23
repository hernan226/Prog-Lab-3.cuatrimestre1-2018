var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
var animales;
(function (animales) {
    var Gato = /** @class */ (function (_super) {
        __extends(Gato, _super);
        function Gato(nombre, raza) {
            var _this = _super.call(this, nombre) || this;
            _this.raza = raza;
            return _this;
        }
        return Gato;
    }(animales.Animal));
    animales.Gato = Gato;
})(animales || (animales = {}));
