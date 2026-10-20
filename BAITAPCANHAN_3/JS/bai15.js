function removeDuplicates(arr) {
  if (arr.length === 0) return [];
  let add_arr = [];

  for (var i = 0; i < arr.length; i++) {
    if (!add_arr.includes(arr[i])) {
      add_arr.push(arr[i])
    }
  }

  return add_arr;
}

console.log(removeDuplicates([1, 2, 2, 3, 4, 4, 5]))