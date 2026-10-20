function countGreaterThan(arr, val) {
  if (arr.length == 0) return 0;
  let count = 0;
  for (var i = 0; i < arr.length; i++) {
    if (arr[i] > val) count++;
  }
  return count;
}

console.log(countGreaterThan([1, 5, 7, 2, 3], 3))
console.log(countGreaterThan([], 5))