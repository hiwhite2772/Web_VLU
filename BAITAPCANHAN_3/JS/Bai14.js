function findMissingNumber(arr) {
  if (arr.length == 0) return 0;
  let tong_thuc_te = 0, tong_day_du = 0;
  
  for (var i = 1; i <= arr.length+1; i++) {
    tong_day_du += i;
  }

  for (var i = 0; i < arr.length; i++) {
    tong_thuc_te += arr[i];
  }

  return tong_day_du - tong_thuc_te;
}

console.log(findMissingNumber([1, 2, 3, 5, 6]))