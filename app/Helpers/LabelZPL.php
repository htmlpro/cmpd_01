<?php

namespace App\Helpers;

use App\PrintLog;

class LabelZPL
{

    private $rx_number;
    private $patient_name;
    private $client_name;
    private $doctor_name;
    private $lot_id;
    private $patient_dob;
    private $used_by;
    private $formula;
    private $label_matrices;

    /**
     * Set the {key} with value
     *
     * @param String $key   variable name
     * @param String $value variable values
     *
     * @return void
     */
    public function setter($key, $value)
    {
        $this->$key = $value;
    }

    /**
     * Return the variables value
     *
     * @param String $key variable name
     *
     * @return String
     */
    public function getter($key)
    {
        return $this->$key;
    }

    /**
     * Generate PDF by FPDF library
     *
     * @return void Return PDF file
     */
    public function generateLabel()
    {
        $formula_short = empty($this->getter('label_matrices')[0]['formula_short']) ? '' : $this->getter('label_matrices')[0]['formula_short'];
        $zpl = "CT~~CD,~CC^~CT~
^XA~TA000~JSN^LT0^MNW^MTD^PON^PMN^LH0,0^JMA^PR6,6~SD20^JUS^LRN^CI0^XZ
^XA
^MMT
^PW860
^LL2550
^LS0";
        switch ($this->getter('client_name')) {
            case 'REAL':
                $zpl .= "
^FO630,1536^GFA,3180,3180,10,1WF8,::JFE1JFC7LFE,:JF81FF8I03LF8:JF80FEK03KF8:JF78FC1IF80KF8IFCFE01FC07C07JF8:IFCFE01EI0701JF8:IF3FF038I03C1IFE,:FFC0FFCL0307FFE,IF0FFCL0301FFE,:JF81FN01FFE,:KF8FCL081FFE,:KF83EN0FFE,KFE0F8M0FFE,:KF8038M0FFE,:LF03F8J018FE78:IF0IFC7FEK0FE78MFE7FL03FF8:FFBKF9FL03FF8:JFE03F9FM0FF8JFI0FE3M0FE,:IFCI03FBCL0FE,:IFCI03F8EL0FE3:IFCI01FC2L0FE3IFK07C18K0FE,:IFK07F18K0FE,:IFK01FM0FE,:IFL07CL03F8IF01EI07EL03FC:IF07FI03EL03F8:IFC7FJ0F84J03F8:IFC1FCI03EK01E,JF1FCI01F8K078:FFBF87FJ07CK07!:FFBFE1FJ01FC,:JFE0FCJ07F8J03KFE0CK0FEJ03:LFN01E,:MFR07:JF87FF8O01!PFE03J01!:UFE3!:MF07JFC01!!:::YFC:1XF807VF8,:,:::::::::::::007,:01CJ0FF8I0KFE,:078I03FFCJ01FC1F8078I0FC07K070078:06I01C007J01F0078:06I01C007J07F00781EI07I07J0E70078:07801FI07I0F81C06,:07807E001FI0F00F1E,:01IF8001C003C00FF8,007FER0C,:003F,:,:T0FE,S03FFC,:J0EN0F1FF,:I0IFM0C1E3,:007F1FCK03C183C,007I0FK030180C,:01CI03CJ030180C,:078I03CJ030183C,:078J0EJ03C183C,06K0EJ03C1FF,:06K0EK0F1FC,:06K0EL01F,06K0E,:078J0C,:078I03CL018,:01CI0FM0FF,007001FL0FE7C,:003IFCL0F00F,:I03FEL03C003C,:R03I03C,R03J0C,:::::01NFI0C003,01NFI0F00F,:R03JF,:S0JF,:,::I03IFC,:007JFCK0KFE,:01FP0KFE,018,:078,:06,::::::078,::01FP0C,:007JFL0F8,:003JFCK03F8,T07E,:T01FC,:T01FFC,:T0180F8,T0180FE,:M0EL0183F8,:L03EL01FFC,:07NFJ07FF,01MFCJ07E,:M0EK0FE,:M0CJ03F8,R03C,:,:::O03003LF807KFC07L03,:01KFC07,:,:T07E3,S0KFE,:,:I0FFE,:003IFC,007I0FL03FFC,:01CI03L03FFC,:078I03CK0C1EF,:078J0EJ03C183C,06K0EJ030180C,::::06K0EJ03C183C,:078J0CJ03C1E3C,:078I03CK0F1FF,:01CI0FCK031FC,007001FN07,:003IFC,:I0FFE,:R03JFC,S0379FC,:V0FC,:V03C,:01JF3P0C,01KFC,:K07FCL018,:L0FM0FF,:L03CI0783FFC,M0C001E0F00F,:M0E00183C003C,:::M0E00183J0C,M0E00183CI0C,:M0C00183CI0C,:L03C001E0C003,003C7FFJ07BF00F,:07JFCJ07KFC,:R07JFC,:,::V03,:018001CO0F,:07801FFCL01FC,06001E3CI0600F8,:0600780EI07FFE,:0600600EJ07F8,:0780E00EK0FE,0783800CL0FE,:01FF003CL01FC,:007CQ01F,:,::^FS
";
                break;

            case 'USA':
                $zpl .= "^FO630,1536^GFA,07680,07680,00016,:Z64:
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:CC93";
                break;

            case 'ALLIANCE':
                $zpl .= "^FO630,1536^GFA,09728,09728,00016,:Z64:
eJztmU2O4zYQhckoALPjBYLmRQbtq+QIc4BGU0FfTLPKLleIjqCs4oVAhlIvzPeVpwVPppF0YC4MPDybUv2wWK/s3H19+PUDcAAeZvAL+DP4Cr6O4BfwZ/C6ga/YINdJcMKGqa54gNlQN6i6QeNX8AW8blBqnYVPalIJsoGveIPiBPvaTJiFjz1ufADvwLus/En5oC/c7FFecVYcquKhXuOd8p15QXffePFWYPjE+Y2f3Lsuk//I94DsuZK/k/Jq0BX7JUF3//XP3P05XnBEfBg/84QWfsUeWPNj/4Jily741T+/XN7fnP9J8Lf4Z1H+Nv8k+iO/v38icOcfszwcxILI+nVC/cpwYGX5UfcQb9b3DxhKFBzWlAQvUY5gWJIXPEcH3mXwp3/ADwv4FfwaXe+gVn7lCvLNPikhawJW+90TAvApagb/zAsnIhsSA6zxPFi3158VvDlfBbw5XwW8JBz47XxpSc7AvMFdRglPwPF3xabFAPZ0KHEGLgd8/TofZuXj1D7SBae53bfxgk9TSw/f4fEk7smTnt886vWYv2h86q/AXs9vGRSvLfmz8K19KD2/ulB6/uy88MveQVz4Rexf/SL+Kb4dju581i04HZ9H5fPy5Nxzh8ujxGerdn18t9o8dLhl39ofqIjrIKDdGK7dBn1AIrBn/sejfEd92b6guK+fn7ePhwt+1q+aVGbqHvH7o4Py/fPrZmGPZ+1v85LF/r37K1/HJ+CE9o/dSkD3bNt7WJjgTFv/tDp41MP2htxQN+D9azZgOClAIjZgB+tMfhzUwwDMFtgz6I/ACZga7yOvH4GHUTH1gbk/ERyjL0x+zeApL3UDIy+P9Gq0F7i+ETb00KsOAsqjfjltj1v2ZDWpqF7d9KGYtF0xY8/DJKMvjX4dwHvwolft7+Ob+pT6B3r1uj4l75TvzBusepB42f5LoMnP773M/IbNk5m/mPHIpDzts+qpgu8T0h/qVeqxSD2WgQfqsUT99YZeffXPBf/b/nnVq92Wh/4xepX+MXr1v+6fAp79VwndM7f+S/R1679CjyP49gXhN4kr2D0ob/V7z+8df4czHIT5BtuHdj/IEW32+0n46mflA/T6S/+EsObfRJ+f04vq9aT8HF+gz7+I/+c4KR+mXh/5hnv97cC7c1T+Cb+vg/Ch/rWIfm/pgfnOn+b8KP9m/lw7f+IPM99NJoKI8J4B37reoT4X8Ga+Q/vlB8RX9I1eYeHm/vUPxfwLwcMFDiNE9wT8qd/cqWja5o99/7v1b5pfZ50fNX8i/+x88Qb+2nyEAzt2CFQonG+M7h2XR4PC8RVfl+lgBZzBnC+9OX9cfdX65jB/lPnFhjF/dJg/OswXdb5jeJ1P7PpA54vgq/K+nV+dP8LDFXqO+Fnta5urRHlwUf8gsRJmVmwkkPue6z6//ljz68eD+fVPdn49Cr5tfn1f93Vf93Vf//v1NxQwcBo=:6732";
                break;

            case 'NATIONWIDE':
                $zpl .= "
^FO630,1536^GFA,4180,4180,10,,::::::::::O031,O03B8,:K0380033,K0380032,J01D80032,J01CC0022,K0EC0062,K06600E6I0C,K02380E7I0C,K031C1E7001C,K031F3FF0038,K039F3FF80738,K01FF1FF83C78,K01FF1CF1F8E,K01FF1CE3E18,K01F30CC3E3,006001F18CC7E7,007I0718987FE,003FFC39898E7E,I07FE0CD99C7C,01E07F06FB38FC,01F83F867BF1F8,I0E3DE37BE7,I03F87F01CE,I01FC1F80380F,J0FE0700383FC0C,J07FFI03KFE,J0307C003F8F9FC,M0EK07,L01E001C0F038,J07FFC003KFE,J0FFEI0387FF0E,I01FE0F00381F8,I03F83F809C06,I07F8F331C7,00DE3FC379E3F,01F83F8679B0FC,00E07F0CF9987C,I0FFE1CC98C7C,003E3C398987FE,007I0F1I87FE,006001F188C3E3,K01F388E3E18,K01FF1873F0C,K01FF1CF0FC78,K01DF1FF80E38,K019F1FF00398,K011E1FF001C,K033C0E7I0C,K02300E2I0C,K0660062,K0CC0022,J01DC0032,J01980012,K0180013,K018001B,O01B8,O0398,O01,,:::::M03KFE,:::M01KFC,Q03F8,Q07F,P01FC,P03F8,P07F,O01FC,O03F8,O07F,N01FE,N03F8,N07F,N0KFE,M01KFE,M03KFE,:M01KFE,,::N03FE,N07FF8,N0IFC,M01IFE,M03F07E,M03E01F,M03C00F,:::::M01E01E,N0F03C,M01JF,M03JF,:::,Q0F,::N03JF,N0KF,M01KF,M03KF,:M03C00F,:::M03I08,,:R01C,M03JF3E,::M03JF1C,,::O03,N03FF,N07FF8,N0IFC,M01IFE,M03F03E,M03E01F,M03C00F,::::M03E01F,M01F07E,M01IFE,N0IFC,N07FF8,N01FE,,::M01IFE,M03JF,::M01IFC,P03C,P01E,Q0E,Q0F,::P01F,P03F,M03IFE,M03IFC,:M03IF,M03FF8,,:Q01,Q0F,P07F,O01FF,O0IF,N07FFC,M03FFE,M03FF,M03F,:M03FE,M01FFE,N07FFE,O0IF,P0FF,O01FF,N01IF,N0IF8,M03FFC,M03FC,M03F,M03FC,M03FF8,M01IF,N03FFE,O07FF,P0FF,P03F,Q03,,::S08,M03JF3E,:::S08,,:O0FC,N03FF,N0IFC,:M01FCFE,M03F03E,M03E01F,M03C00F,::::M01E01E,M01F03E,N0IFC,M03KFE,:::,:::N01FF,N07FF8,N0IFC,M01IFE,M01F7BE,M03E79F,M03C78F,:::::M03C79F,M03E7FE,M01E7FC,N0C7FC,N087F,O038,,:::::::M03,M03C,M03F,M03FE,M03FF8,M01FFE,N03FF8,N01IF,N01IFC,N01EIF,N01E1FFC,N01E07FE,N01E00FE,N01E007E,N01E00FE,N01E07FE,N01E1FFC,N01E7FF,N01IF8,N01FFE,N03FF8,N0FFE,M03FF,M03FC,M03F,M03C,M03,,:M03KFE,:::,:::M03KFE,:::,::O0FC,N03FF,N0IFC,M01IFC,M01IFE,M03E39F,M03C78F,:::::M03C79F,M03E7BE,M01E7FE,M01C7FC,N087F8,O03E,,::M01IFE,M03JF,::M03IFE,P03E,P01E,Q0F,:::P01F,P01E,Q06,,L0E00FE,K03E03FF8,K07E07FFC,K07E0IFE,K0FC1FC7E,K0F01F01F,J01F01E00F,J01E03E00F,J01E03C00F,:J01E03E00F,J01F03E01F,K0F87F03E,K0MF,K07FF7IF8,K03FF3IF8,K01FE1FF3,L030038,,Q01,Q0F,P03F,O01FF,K018007FF,K01E03FFE,K01F8IF,K01JF8,K01IFC,L07FF,L01FFC,M03FF8,N0FFE,N03FF8,O0IF,O01FF,P07F,Q0F,Q03,S02,:R07E,R046,S02,,R07E,R01E,R078,R07,R01E,R07E,,:::::::::::::^FS
";
                break;

            case 'AP ALLERGY':
                $zpl .= "^FO630,1536^GFA,83655,83655,143,,:::::::::::::::::::::::::::J018,:J01C,J01F,J01FC,J01FF,J01FFC,J01807E,J01I0F8,J01I0FF,J01I0CFC,N0C3F,N0C07C,N0C01F8,N0C007E,N0CI0FE,N0C003FFC,N0C00JF,N0C07JFC,N0C1KFE,N0C7KF8,J01I0LFE,J01003KFC,J0101LF,J0187KF8,J01LFE,J01LF8,J01KFC,J01KF,J01IFE,J01IF8,J01FFE,J01FF,J01FC,J01F,J01C,J01,:,::J01P04,::J018O0C,J01CN01C,J01PFC,::::::::J018I018J0C,:J01J018J0C,:J01J01CI01C,O01CI01C,O01EI03C,O01F800FC,P0FF87F8,P0KF8,P07JF8,P07JF,P03JF,P03IFE,P01IFC,Q0IF8,Q03FF,,::::::::::::::::J01,J018,:J01C,J01F,J01FF,J01FFC,J01C1F8,J01807E,J01I0F8,J01I0FF,J01I0CFC,N0C07C,N0C01F8,N0C007E,N0CI0F8,N0CI0FE,N0C003FFC,N0C00JF,N0C1KFE,N0C7KF8,J01I0LFE,J01I0LF,J01003KFC,J0101LF,J0187KF8,J01LFE,J01KFC,J01KF,J01JFC,J01IFE,J01IF8,J01FFE,J01FF,J01F,J01C,J018,J01,:,:J01P04,::J018O0C,:J01PFC,::::::::J01CO0C,J018O04,::::J018,:::::J01C,:J01E,J01F8,J01FC,J01FF,J01FFE,K01FFC,N0C,,:J01P04,:::J018O0C,:J01PFC,:::::::J01FN03C,J01CO0C,J018O04,::::J018,:::::J01C,J01E,J01F,J01F8,J01FC,J01FF,J01FFE,K01FFC,,:4,J01P04,:::J018O0C,J01PFC,::::::::J01F8I0CJ0C,J01CJ0CJ0C,J018J0CJ0C,::J018I03FJ0C,J018I07F8I0C,J018001FFEI0C,J01800JFC00C,J01803KF00C,J018O0C,J01CN01C,J01CN03C,J01EN07C,J01FN0FC,J01F8L01FC,J01FCL0FFC,J01FEK03FFC,J01FF8,M07,,:::J01P04,::J018O0C,J01CN01C,J01PFC,::::::::J01CI018J0C,J018I018J0C,J01J018J0C,J01J078J0C,J01I01F8J0C,N03F8J0C,N0FFCJ0C,M01FFCI01C,M07FFCI01C,M0IFEI03C,L07JFE03F8,K01OF8,K03IFCKF8,K0JF8KF8,J01IFE07JF,J01IFC07JF,J01IF003IFE,J01FFCI0IF8,J01FFJ07FF,J01FEJ01FC,J01F8,J01F,J01C,J018,:J01,,:N03FFC,M01JF8,M07JFE,M0LF8,L07LFE,L0NF,K01NF8,K01NFC,K03NFE,K07NFE,K07FF8001IF,K0FCL03F8,J01F8M0F8,J01FN07C,J01EN03C,J01CN01C,J038O0E,:J03P06,::::J03J08K06,:J0380018K0C,:J01JF8J01C,J01JF8J018,J01JF8J038,J01JF8J078,J01JF8J0F,K0JF8I01F,K0JF8I0FF,K07IF8003FF8,K07IF800IFE,N0F8,N018,:O08,,:U04,:U0C,T01C,T03C,S03FC,S07FC,R01FFC,R07FFC,J01L01IFC,J01L07IFC,J01K01JFC,J01J01KFC,J018I03KFC,J01CI0KF04,J01NFC04,J01NF004,J01MFC004,J01MF,J01LF8,J01KFE,J01KF8,J01JFE,J01KF,J01CI07C,J018I01E,J01K078,J01L0F,J01L03C004,J01M0F004,R03C0C,R01F0C,S07FC,S01FC,T03C,T01C,U0C,U04,:,::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::^FS
";
                break;

            case 'PRIMARY':
                $zpl .= "
^FO630,1536^GFA,2480,2480,10,,:::::I07FE,:007F07C,00EI0F,038I018,0703F00E,061FI078,0C78I018,18EK0C,18CK07,318K03C,:31L01E,331IFE00F,221IFE0038,220070E001C,620070EI0E,6I070EI0E,2I070E001C0FFC,2I030E0038FE0F8,:3I039E00F1E001F,3I03FE01E7J038,3I01FC03CE007804,18L071CI0602,18L0E38I0183,0CK01CFK041,06K079E0EI0308,03K0F1C0F8I088,038I01E3003FJ04,:00EI0F0EI0FCI04,007FDFE0CI07F0044,001IF018I063C004,M0FJ060E004,M07J060E004,M018I073C004,N0CI07FI04,N0EI0FCI04,N07003FJ0C,:N01C0F8J08,N01E0EJ018,O0FL018,O038K03,O01CK06,P0EK0C,P07J038,P01E001F,:O010FF0FC,2O081FFE,P0C,P04,2O08,2N01,2N02,O0C,1M01,:1M02,08L04,04L08,04K01,02K06,018J08,00CI03,003C03C,I03FC,:,:::::7VFE,,:::::::04,07K0E,01CJ07C,:003CJ07I01JF,001F8I03F001JF,J07I021C01JF,J03C00207K01,J07C0021FCJ01,001FFI03FCK01,003F8I07FJ0203,01FCI07FK01FE,07EJ0FCK01FE,:07K0E,04J01,,:03,060078L01JF,0400FC0JFC1JF,0403C20JFC10401,:0407820F801C00401,041F0208L0401,023F021M0C01,03FC061L01E03,00EI01L079FE,L018K0E07E,M08J01C,R018,R01,:060078,0400FC,0403C60JFC,0407820JFC,041F8208J01JF,063F021K01JF,03FC061K01I01,01F8041,L01,:L018,,003F8,00IFM01C,01IF8L017FC,03C0180E001CI07F,03I040JFCI07E,06K0JFC003F8,04I02080C0C00FC,:04I02100C0C03E,04I02100C0C0F8,04I02100C0C1E,04I02180C1C06,04I0608K01C,02I0CN078,03001CN01F,01IF8O07C,:00IFO0IF,001FCM01IFC,M0JFC1F8,M0JFC1,N0100C,007FEI0100C,00IFI0100C,01E03800301C18,03800C00FE301E,:03I0401C3F003C,06I020781EI0F8,06I020FL0878,04I0208L080E,04I0218L083F,04I02N0BFC,04I02003EI01FC,04I0600FF8007E,06I0601FFE01F,:03I0C07C0701C,M0F00101,M0E001C,M08I0C,L018I0C,06I041J0C,07IFE1J0C1JF,::L01J0C1JF,L018100C00401,M0FF01C00401,M0FF03I0C01,06Q01E03,078P03BFE,00EP0F07E,003FM0C1C,001BCK01C18,:J03K07C1,J03EI01E,J0FCI03CK01,003FE0083FL07,007F800FFCL0F,03F8I0FFCK07C,07CL0EJ03F,06M01801FF8,04N0601FE,:K06J03C1BE,K02K0C001C,K02O038,K02P07,K02P03,07IFEP01,07IFC,07IFE,:K02,::K06,:,::::07IFE,::040302,::040306,060306,,::::03,0600FC,0403E4,0407C2,040782,:041F02,037C02,01F806,004,,:::^FS
";
                break;

            case 'PRESCRIPTION':
                $zpl .= "^FO630,1504^GFA,10240,10240,00020,:Z64:
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:9313";
                break;

            case 'EXPERTUS':
                $zpl .= "^FO630,1536^GFA,2665,2665,13,,::::::00LF8,01LFC,:00LF8I01IFC,K0EK03KFC,K0EK0MF8,K0EJ03MFE,K0EJ07NF,:K0EJ0IF07E3FF8,K0EJ0FF007C03F8,K0EI01FC007C00FC,:K0EI01F8007C00FC,J01FI01F8007C00FC,01LFC1FC007C01FC,01LFC0FE007C03F8,00LF80FF807EIF8,P0IF07JF,P07FF07JF,P03FF07IFC,P01FF07IF8,Q03F07FFC,00LF8I0307FC,01LFC,01LFC0ER03,01LFC0FCP01F,01E00F03C0FF8O0FF,01E00F03C0IFN07FF,01E00F03C0IFEL03IF,01E00F03C0JFCJ01JF,01E00F03C0KF8I0JFE,01E00F03C01KF007JF8,01E00F03C001JFC3JFC,01E00F03CI03NFE,01E00F03CJ07MF,00CJ038K07KF8,T03JF8,S01KFE,01EP0MFC,01F8N07NFC,01FEM03JFC3JF8,007F8K01JFE007JF,001FFK0KFJ0JFE,I07FCJ0JF8J01JF,I03FFJ0IFCL03IF,I03FFEI0FFEN07FF,I0387F800FFP0FF,I0381FE00F8P03F,I03807FC0CR07,I03807FC,I0381FF,I0387F8,I03FFE,I03FF8I0TF,I07FCJ0TF,001FFK0TF,00FF8K0TF,01FEL0TF,01F8L0TF,01CS0FFJ07F,V07EJ03F,:V07FJ03F,00LF8M07FJ07F,01LFCM07FJ07F,01LFCM07F8I0FE,01LF8M03FE003FE,01ES03LFE,01ES03LFC,01ES01LFC,01ET0LF8,01ET07KF,01ET01JFE,00EU07IF,M038,M03C,::M03C0SFE,M07C0TF,01LFC0TF,::M03C0TF,:M03C0FCJ07FJ03F,::M0380FCJ07FJ03F,P0FCJ07FJ03F,::01LFC0FCJ07FJ03F,:00LF80FCJ07FJ03F,K0FJ0FCJ02K03F,K0EJ0FCP03E,K0E,:::K0EJ0TF,:::J01FJ0TF,01LF80TF,01LFC0TF,01LFCM07EJ03F,V0FEJ03F,U07FEJ03F,T03IFJ03F,S01JFJ07F,J03CM0KF8I0FE,I01FFCK07KFC001FE,I07IFJ03JFDFFC3FFE,001JF8001JFE0LFE,003F80FC00KF00LFC,007E003E00JF8007KF8,0078001F00IFEI03KF,00F8I0F80IFK0JFC,00FJ0780FF8K03IF,01EJ0380FC,01EJ03C0E,01EJ03C,01EJ03CS07F,01CJ03CS07F,01EJ03CS07F,:00EJ038S07F,00FJ078S07F,00F8I0F8S07F,0078I07T07F,P0TF,018M0TF,01FM0TF,01FCL0TF,00FFL0TF,003FEK0TF,I0FF8J07SF,I03FEV07F,I03FF8U07F,I03DFFU07F,I0383FCT07F,I0380FF8S07F,I03803FCS07F,I0380FF8S07F,I0383FEI07OF8,I039FFI03PFC,I03FFCI07PFC,I03FFJ0QFC,I0FF8J0QFC,003FEK0QF8,00FFK01FC,01FCK01F8,01FL01F8,008L01F8,O01F8,:O01FC,01LF80QF8,01LFC0QF8,01LFC0QFC,J03C03C07PFC,J07803C03PFC,J0F8038007OF8,I03FC038,I07FC078,001F9E078,003F1F1F8,00FE0IF,01F807FEO03FC,01F003F8007EJ01IF8,01CM0FEJ03IFE,008M0FCJ07JF,O01FCI01KF8,O01F8I03KF8,O01F8I07FF0FFC,00LF81F8I0FFC03FC,01LFC1F8001FF801FC,01LFC1FC003FEI0FC,01LFC1FC00FFCI0FC,01E00F03C1FF03FF8I0FC,01E00F03C0LFJ0FC,01E00F03C07JFEI01FC,01E00F03C07JFCI01F8,01E00F03C01JFJ01F8,01E00F03C00IFE,01E00F03C003FF,01E00F03C,:00EJ038,,::::^FS
";
                break;

            case 'LIFELINE':
                $zpl .= "^FO630,1536^GFA,3904,3904,16,,::::gO02,gO03,::::gO02,:gO03,:gO01,::gN08,::gN0808,:gP08,::gM04008,::::gP08,:::::,:gL01,,:::::::::gL018,gL01,:gM02,K03FFEK0C18L018,J01JFCI06001J0600381,J03KF003J040038M018,:J0LF8060100180401L01,I07FC001FCK018C10CI0F,O0F061J03,:O0F18K060C2,::03MFC18418038I01MF8,:07MF0E303J021C7MF8,1MFE1I0600C0820NFE,18M010CL08438M04,:P0106J02003C,I073M01J0220FEI0F,I03J030C186001861FF807FC1FC,J0C0FF820040FF8100PFC,:J03J07003J06003OFC,J0180018I0C001CI0JFCJFC,K03D1CJ01C0CJ03IF00JF,gL01JF,:gL03JF,::::gL07JF,gL0KF,:::gL07IFE,gL07IFC,::gM0IFC,:gL01IFC,:::::::gM0IFC,:gM07FFC,gM03FFC,:gM01FFC,::::gM01E78,:::::gM01878,:Y03M01878,S0CK03O07,:K060018I07LFO07,K06I08I07LFO07,S06K03O07,O08I08K03O03,M063J08U01,M01CJ08,S08,::::K0181,:S0E,M018J07C,,::K07FE08,W0C06,S07IFE0F,K07FFK07IFE0F,:,N08,M018,:K07FEO04,:W0C,:S07KF8,M018J07001E1E,K07FFO0C03,W0401C,:Y01C,K078,K04018K03FC,M018K0IF,:M03K03E11C,K079CK070106,S0E0306,:S0C0306,::K07FFK080306,:S0C030E,N08J0601F,,:M06,J0307R03,K0FM04K038,L07L07LF8,:M07K07LF8,,:::::::S07IFE0F,:L07F8J06I0C,K01C06,:K03,K08I08,K04M07IFE,:K04I08I07IFE,K04I0CL018,W0C,:K03Q06,::K08018N06,:M018N06,M018N0E,K07FEK07IFC,S07IF8,:S04,K07FF,,:U02,M018K0IF,S03IFC,K01EEK07800E,K06008J060306,::K04018J0C0306,:K04008I01C0306,L01EK0C0306,S0E031C,S0601F,:V0C,,:::::::^FS";
                break;
        }


//TOP  PRESCRIPTION ALLERGY 1:1 v2

        $zpl .= "^FT724,2194^A0R,46,45^FB314,1,0,C^FH\^FDALLERGENIC^FS
^FT666,2194^A0R,46,45^FB314,1,0,C^FH\^FDEXTRACT^FS
^FT608,2194^A0R,46,45^FB314,1,0,C^FH\^FDPRESCRIPTION^FS
^FT550,2194^A0R,46,45^FB314,1,0,C^FH\^FDTREATMENT^FS
^FT531,1544^A0R,42,40^FH\^FDRX# " . $this->getter('rx_number') . "^FS
^BY3,3,40^FT480,1544^BCR,,N,N
^FD>:{{tk_fill_id}}^FS
^FT406,1544^A0R,42,50^FH\^FD" . $this->getter('patient_name') . "    " . $formula_short . "   DR. " . $this->getter('doctor_name') . "^FS
^FT338,1544^A0R,33,33^FH\^FDPrepared in accordance with individual's requirements as prescribed.^FS
^FT289,1544^A0R,33,33^FH\^FDCAUTION: Rx Only^FS
^FT289,1803^A0R,33,33^FH\^FDStore Between 36-46\F8F (2-8\F8C)^FS
^FT238,1544^A0R,33,33^FH\^FDCompounded by:^FS
^FT235,1780^A0R,33,33^FH\^FDRite Away Pharmacy^FS
^FT194,1780^A0R,33,33^FH\^FD2235 Thousand Oaks Dr. #102^FS
^FT153,1780^A0R,33,33^FH\^FDSan Antonio, TX 78232^FS
^FT112,1780^A0R,33,33^FH\^FDTX License# 26990/AS^FS
^FT153,2160^A0R,33,33^FH\^FDLOT# " . $this->getter('lot_id') . "^FS
^BY3,3,40^FT100,2160^BCR,,N,N
^FD>:{{rx_lot}}^FS";

        $i = 0;
        $k = 0;
        foreach ($this->getter('label_matrices') as $key => $value) {
//label5  307   ^FH\^==>

            $zpl .= "^FT790," . (1448 - $k * $i) . "^A0I,33,33^FH\^FD" . $value['vial'] . "    ALLERGENIC EXTRACT/SPECIAL MIXTURE^FS
^FT790," . (1415 - $k * $i) . "^A0I,33,33^FH\^FD " . $value['client_name'] . "   " . $value['class'] . "^FS
^FT790," . (1382 - $k * $i) . "^A0I,33,33^FH\^FD" . $value['color'] . " " . $value['formula_short'] . "   DR. " . $this->getter('doctor_name') . "^FS
^FT790," . (1349 - $k * $i) . "^A0I,33,33^FH\^FDPT.NAME/DOB: " . $this->getter('patient_name') . " / " . date('n/j/Y', strTotime($this->getter('patient_dob'))) . "^FS
^FT790," . (1316 - $k * $i) . "^A0I,33,33^FH\^FDRX# " . $this->getter('rx_number') . "/LOT# " . $this->getter('lot_id') . "  USEBY: " . date('n/j/Y', strTotime($this->getter('used_by'))) . "^FS
^FT590," . (1283 - $k * $i) . "^A0I,29,28^FH\^FDStore Between 36-46\F8F (2-8\F8C)^FS
^FT670," . (1255 - $k * $i) . "^A0I,29,28^FH\^FDRx Only Rite Away Pharmacy^FS
^FT710," . (1227 - $k * $i) . "^A0I,29,28^FH\^FD2235 Thousand Oaks Dr, #102 San Antonio, TX 78232^FS";
            $k = 304;
            $i++;
        }
        $zpl .= "^PQ1,0,1,Y^XZ";
        $user = auth()->user();
        $file_path = public_path("printlabelPdf/" . $user->id . ".pdf");
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "http://api.labelary.com/v1/printers/8dpmm/labels/4.5x14.5/");
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $zpl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Accept: application/pdf"));
        $result = curl_exec($curl);
        if (curl_getinfo($curl, CURLINFO_HTTP_CODE) == 200) {
            $file = fopen($file_path, "w");
            fwrite($file, $result);
            fclose($file);
        } else {
            print_r("Error: $result");
        }
        curl_close($curl);
        $user = auth()->user();
        $plog = new PrintLog();
        $plog->rx_number = $this->getter('rx_number');
        $plog->user_id = $user->id;
        $plog->type = 'Label';
        $plog->ip = $_SERVER['REMOTE_ADDR'];
        $plog->save();
        $redrect_path = asset('/') . 'public/printlabelPdf/' . $user->id . '.pdf';
        header("Location:$redrect_path");
        exit();
    }
}
