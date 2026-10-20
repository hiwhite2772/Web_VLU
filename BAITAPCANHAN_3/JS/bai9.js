function alternateSum(arr) {
  if (arr.length == 0) return 0;
  let total = 0;
  for (var i = 0; i < arr.length; i++) {
    if (i % 2 == 0) {
      total += arr[i];
    } else {
      total -= arr[i]
    }
  }
  return total;
}

console.log(alternateSum([10, 5, 6, 3]))