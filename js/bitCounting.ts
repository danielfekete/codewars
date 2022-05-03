function countBits(n: number): number {
    const len :number=n>1?Math.ceil(Math.log2(n)):1;
    let bits :string="";
    for(let i :number=len-1;i>=0;i--){
        let x :number=Math.pow(2,i);
        if( n%x < n){
            bits+="1";
            n=n-x;
        }else{
            bits+="0"
        }
    }
    return bits.split("").filter(x=>x==="1").length;
}
