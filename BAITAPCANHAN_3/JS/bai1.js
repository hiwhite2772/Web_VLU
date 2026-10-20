function findMax(arr) {
  let max = arr[0];

  for (var i = 0; i < arr.length; i++){
    if (arr[i] > max) {
      max = arr[i];
    }
  }
  return max;
}

console.log(findMax([1, 3, 5, 7, 9]))
console.log(findMax([10, 20, 30, 40, 50]))
console.log(findMax([5, 2, 8, 1, 4]))