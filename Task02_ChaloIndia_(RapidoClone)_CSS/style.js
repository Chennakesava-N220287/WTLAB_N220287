function greet(name) {
  return "Hello, " + name;
}

console.log(greet("Rangam"));


const add = function(a, b) {
  return a + b;
};

console.log(add(5, 3));


const square = (n) => n * n;

console.log(square(4));


function factorial(n) {
  if (n === 1) return 1;
  return n * factorial(n - 1);
}

console.log(factorial(5));



(function () {
  console.log("hiiiiiii");
})();


(function (name) {
  console.log("Hello", name);
})("Rangam");

