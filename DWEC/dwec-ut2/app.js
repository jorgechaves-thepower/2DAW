console.log('----- 1. VARIABLES -----');
const NOMBRE_TIENDA = 'TechShop';
const IVA_GENERAL = 0.21;
const carrito = [];

let numeroProductos = 0;

console.log(NOMBRE_TIENDA, IVA_GENERAL, numeroProductos);

numeroProductos = numeroProductos + 1;
numeroProductos = numeroProductos + 1;

console.log('Productos en el carrito: ', numeroProductos);

carrito.push('Teclado');
carrito.push('Ratón');
console.log(carrito);

console.log('----- 2. TIPOS DE DATOS -----');

const edadCliente = 30;
const nombreCliente = 'Ana';
const esSocio = true;
let telefono;
const direccion = null;

console.log(typeof edadCliente);
console.log(typeof nombreCliente);
console.log(typeof esSocio);
console.log(typeof telefono);
console.log(typeof direccion);
console.log(typeof carrito);

let dato = 42;
console.log(typeof dato);
dato = 'cuarenta y dos';
console.log(typeof dato);

console.log('----- 3. NÚMEROS -----');
console.log(0.1 + 0.2);
console.log(0.1 + 0.2 === 0.3);

const precioRaton = 1999;
const precioAuriculares = 2550;
const sumaCentimos = precioRaton + precioAuriculares;
console.log(sumaCentimos);
console.log((sumaCentimos / 100).toFixed(2) + ' €');
console.log(typeof(sumaCentimos/100).toFixed(2));

console.log(10/0);
console.log(Number('hola'));
console.log(NaN == NaN)
console.log(Number.isNaN(Number('hola')));

const anchoCss = '250px';
console.log(Number(anchoCss));
console.log(parseInt(anchoCss))
console.log(parseFloat('12.5kg'));
console.log(Number(''));
console.log(parseFloat('20 anios'));

console.log('----- 4. TEXTOS -----');
const correoEntrada = '  ana.GArcia@GM   Ail.com   '.trim().toLowerCase().replaceAll(' ', '');
console.log(correoEntrada);
console.log(correoEntrada.length);
console.log(correoEntrada.split('@'));
console.log(correoEntrada.split('@')[0]);
console.log(correoEntrada.includes('@'))

const cuponEntrada = '  black.friday '.trim().toUpperCase().replaceAll('.','_');
console.log(cuponEntrada);
console.log(cuponEntrada.startsWith('BLACK'));

const numeroPedido = String(7).padStart(10, '0');
console.log('Pedido ' + numeroPedido + ' de ' + nombreCliente + '(' + correoEntrada + ')' );
console.log(`Pedido ${numeroPedido} de ${nombreCliente} (${correoEntrada})`);

console.log('---- 5. CONVERSIONES ----');
const cantidadFormulario = '3';
console.log(cantidadFormulario + 2);
console.log(cantidadFormulario - 2);
const cantidad = Number(cantidadFormulario);
console.log(cantidad + 2);

console.log('3' + 4 + 5);
console.log(3 + 4 + '5');

console.log(Boolean(0));
console.log(Boolean(''));
console.log(Boolean(null));
console.log(Boolean('0'));
console.log(Boolean('false'));

console.log('---- 6. OPERADORES ----');
const precioUnidad = 1999;
const unidad = 4;
const subtotal = precioUnidad * unidad;
console.log('Subtotal (céntimos):', subtotal);
console.log('¿Unidades pares?', unidad%2 === 0);
console.log(2 ** 10);


let puntos = 0;
puntos += 50;
puntos *= 2;
console.log('Puntos:', puntos);

let contador = 0;
console.log(contador++);
console.log(contador);
console.log(++contador);


console.log(cantidadFormulario == 3);
console.log(cantidadFormulario === 3);
console.log(cantidad === 3);

const edadComprador = 18;
const tieneTarjeta = true;
console.log('¿Puedes comprar?', edadComprador >= 18 && tieneTarjeta);
console.log(!esSocio);

const alias = 0;
console.log(alias ?? 1);

const preciosCarrito = [2500, 1999, 4550, 899];
let sumaCarrito = 0;
for (let i = 0; i < preciosCarrito.length; i++) { 
    console.log(`Producto ${i + 1}: ${(preciosCarrito[i] / 100).toFixed(2)} €`); 
    sumaCarrito += preciosCarrito[i];
}
console.log('Suma del carrito:', (sumaCarrito /100).toFixed(2) +'€');