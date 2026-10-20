function findLongestWord(arr) {
  if (arr.length == 0) return 0;
  let max = arr[0].length;
  let ans = arr[0];
  for (var i = 0; i < arr.length; i++) {
    if (arr[i].length > max) {
      max = arr[i].length;
      ans = arr[i];
    }
  }

  return ans;
}

console.log(findLongestWord(["apple", "banana", "cherry", "date"]))
console.log(findLongestWord(["hello","world", "this", "is", "great"]));