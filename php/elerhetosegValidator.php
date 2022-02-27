<?php
declare(strict_types=1);

class ElerhetosegValidator{
    /**
     * Piszkozat kliens oldali formában kerül validálásra
     */
    private array $elerhetosegPiszkozat;
    private array $elerhetosegSzotarak;
    private array $piszkozat;
    private string $azonositasiMod;
    private bool $kerelmezoNTSZ;
    private array $layout;
    public function __construct(array $elerhetosegPiszkozat,string $frame)
    {
        #Elerhetoseg szotarak
        $this->elerhetosegSzotarak=getElerhetosegSzotarak_7880584859546788();
        #Elerhetoseg layout
        $this->layout=getElerhetosegAdatok_7880584859546788($frame);
        #Kliens oldali piszkozat
        $this->piszkozat=getPiszkozat_7233270857229111($frame);
        #Kerelmezo ntsz-e
        $this->kerelmezoNTSZ=$this->piszkozat["azonositas"]["kerelmezoNTSZ"]["ertek"];
        #Azonositasi Mod
        $this->azonositasiMod=$this->piszkozat["azonositas"]["azonositasiMod"]["ertek"];
    }

    public function validate() :array{
        $invalidFields=[];

        return $invalidFields
    }
}

class ElerhetosegSegedValidator extends ElerhetosegValidator{
    public static function convert
}