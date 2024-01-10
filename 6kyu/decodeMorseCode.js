// https://www.codewars.com/kata/54b724efac3d5402db00065e/train/javascript

function decodeMorse(morseCode) {
  // You can use MORSE_CODE[morse]

  return morseCode
    .split("   ")
    .map((word) =>
      word
        .split(" ")
        .map((char) => MORSE_CODE[char])
        .join("")
    )
    .join(" ")
    .trim();
}
