<?php
function  generatePDFSection(string $sectionTitle, $dataFields, array $piszkozat): string
{
  $html = <<<HTML
  <table align="center" border="0" cellpadding="3" cellspacing="0" style="width: 100%;">
  <tbody>
      <tr>
          <td colspan="2" style="border-width: initial; border-style: none; border-color: initial; background-color: rgb(242, 242, 243); color: rgb(0, 75, 136);">
              <p class="p-title">{$sectionTitle}</p>
          </td>
      </tr>
  HTML;
  if ($dataFields) {
    if (is_array($dataFields) && count($dataFields) > 0) {
      //Adatok kiíratására
      foreach ($dataFields as $field => $label) {
        if (isset($piszkozat["kliens"][$field])) {
          $value = $field === "ugyszam" ? $piszkozat[$field] : $piszkozat["kliens"][$field];
          if (in_array($field, ["kezbesitesModja", "csatolmanyok"])) {
            $html .= <<<HTML
                      <tr>
                          <td class="label">
                              <p>$label</p>
                          </td>
                      </tr>
                      HTML;

            if ($field === "kezbesitesModja") {
              //Kezbesites modja megjelenítés
              $kezbesitesLabelek = [
                'SZEMELYES' => 'Személyesen vagy képviselő útján',
                'LAKOHELY' => 'Postázva a lakóhelyre',
                'TARTHELY' => 'Postázva a tartózkodási helyre',
                'EGYCIM' => 'Postázva egyéb belföldi címre'
              ];
              $teljesCim = match ($value) {
                'SZEMELYES' => '',
                'LAKOHELY' => $piszkozat["kliens"]["lakohely"],
                'TARTHELY' => $piszkozat["kliens"]["tarthely"],
                'EGYCIM' => $piszkozat["kliens"]["kezbesitesiCim"]
              };
              $html .= <<<HTML
                              <tr>
                                  <td class="sub-value">
                                      <p>{$kezbesitesLabelek[$value]} {$teljesCim}
                                      </p>
                                  </td>
                              </tr>
                          HTML;
            } else {
              //Csatolmányok megjelenítés
              $html .= <<<HTML
                              <tr>
                                  <td class="sub-.value">
                                      <p>{$value[0]["fajlnev"]}
                                      </p>
                                  </td>
                              </tr>
                          HTML;
            }
          } else {
            $html .= <<<HTML
                  <tr>
                      <td class="label">
                          <p>{$label}</p>
                      </td>
                      <td class="value">
                          <p>{$value}</p>
                      </td>
                  </tr>
                  HTML;
          }
        }
      }
    } elseif (is_string($dataFields)) {
      //Eredmény kiíratására
      $html .= <<<HTML
                  <tr>
                      <td coslpan="2" class="value">
                          <p>$dataFields</p>
                      </td>
                  </tr>
                  HTML;
    }
  }
  $html .= <<<HTML
      </tbody>
  </table>
  HTML;
  return $html;
}



