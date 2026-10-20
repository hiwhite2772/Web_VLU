function calculateGrade(arr) {
  if (arr.length == 0) return 0;
  let total = 0;
  for (var i = 0; i < arr.length; i++) {
    total += arr[i];
  }

  let avg = total / arr.length;
  
  if (avg >= 90) return "A";
  else if (avg >= 80) return "B";
  else if (avg >= 70) return "C";
  else if (avg >= 60) return "D";
  else return "F";
}

console.log(calculateGrade([90, 80, 100]))