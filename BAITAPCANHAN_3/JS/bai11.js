function filterEvensAndSum(arr) {
  if (arr.length == 0) return 0;
  let total = 0;
  for (var i = 0; i < arr.length; i++) {
    if (arr[i] % 2 == 0) {
      total += arr[i]
    }
  }
  return total;
}

console.log(filterEvensAndSum([1, 2, 3, 4, 5, 6]))
console.log(filterEvensAndSum([12, 14, 15, 19, 20, 100]))