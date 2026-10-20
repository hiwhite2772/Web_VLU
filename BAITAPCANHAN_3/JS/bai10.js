function sumOfSquares(arr) {
  if (arr.length == 0) return 0;
  let total = 0;
  for (var i = 0; i < arr.length; i++) {
    total += arr[i]**2
  }
  return total;
}

console.log(sumOfSquares([1, 2, 3]))