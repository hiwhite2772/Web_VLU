function findPairsWithSum(arr, target) {
  if (arr.length === 0) return [];
  let pairs = [];

  for (var i = 0; i < arr.length; i++) {
    for (var j = i + 1; j < arr.length; j++) {
      if (arr[i] + arr[j] === target) {
        pairs.push([arr[i], arr[j]])
      }
    }
  }

  return pairs;
}

console.log(findPairsWithSum([1, 2, 3, 4, 5], 5))