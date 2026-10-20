function countPositiveNumbers(arr) {
  let count = 0;
  for (var i = 0; i < arr.length; i++) {
    if (arr[i] > 0) {
      count++;
    }
  }
  return count;
}

console.log(countPositiveNumbers([-1, 2, 3, -4, 5]))