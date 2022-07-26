export function numberToEnglish(n: number): string {
    if(n < 0 || n % 1 != 0) 
      return ""
    if (n < 20) 
      return {0: 'zero', 1: 'one', 2: 'two', 3: 'three', 4: 'four', 5: 'five', 6: 'six', 7: 'seven', 8: 'eight', 9: 'nine',
             10: 'ten', 11: 'eleven', 12: 'twelve', 13: 'thirteen', 14: 'fourteen', 15: 'fifteen', 16: 'sixteen',
              17: 'seventeen', 18: 'eighteen', 19: 'nineteen'}[n] ?? ""
    if (n < 100) 
      return ['twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'][(n / 10 | 0) - 2] + (n % 10 ? ' ' + numberToEnglish(n % 10) : '')
    if (n < 1e3) 
      return numberToEnglish((n / 100) | 0) + ' hundred' + (n % 100 ? ' ' + numberToEnglish(n % 100) : '')
    if (n < 1e6) 
      return numberToEnglish((n / 1e3) | 0) + ' thousand' + (n % 1e3 ? ' ' + numberToEnglish(n % 1e3) : '') 
  }