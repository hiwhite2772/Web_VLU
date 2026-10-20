function isAscending(arr) {
  if (arr.length == 0) return 0;
  let isascending = true; 
  for (var i = 0; i < arr.length; i++) {
    if (arr[i] >= arr[i+1]) isascending = false;
  }
  return isascending;
}

console.log(isAscending([1, 2, 3, 5]))
console.log(isAscending([8, 9, 4, 5]))
console.log(isAscending([]))