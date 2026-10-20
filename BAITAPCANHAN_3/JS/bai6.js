function calculateAverage(arr) {
  if (arr.length == 0) return 0;
  let total = 0;
  for (var i = 0; i < arr.length; i++) {
    total += arr[i];
  }
  return total / arr.length;
}

console.log(calculateAverage([10, 20, 30, 40, 50]))
console.log(calculateAverage([]))