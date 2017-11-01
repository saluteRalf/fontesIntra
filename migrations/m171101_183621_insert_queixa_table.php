<?php

use yii\db\Migration;

class m171101_183621_insert_queixa_table extends Migration
{
    public function safeUp()
    {
        // Alterando o charset da base de dados
        $this->execute('ALTER DATABASE salute DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci');
        $this->execute('ALTER TABLE `queixa` CHANGE `apelido` `apelido` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NULL DEFAULT NULL;');
        $this->execute('ALTER TABLE `queixa` CHANGE `protocolo` `protocolo` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NULL DEFAULT NULL;');
        $this->execute('ALTER TABLE `queixa` CHANGE `criterio_inclusao` `criterio_inclusao` TEXT CHARACTER SET utf8 COLLATE utf8_swedish_ci NULL DEFAULT NULL;');

        $this->insert('queixa',array('apelido'=>'Administrativo','protocolo' =>'RM10','criterio_inclusao' =>'Solicitações administrativas ou de autoridades'));
        $this->insert('queixa',array('apelido'=>'Afogamento','protocolo' =>'RT1','criterio_inclusao' =>'Paciente consciente ou inconsciente após submersão em água e parada respiratória.'));
        $this->insert('queixa',array('apelido'=>'Agitação e Situação de violência','protocolo' =>'RC4','criterio_inclusao' =>'Pacientes com alteração de comportamento (agitação ou inquietação) que podem ter etiologia psiquiátrica ou orgânica'));
        $this->insert('queixa',array('apelido'=>'Asma','protocolo' =>'RC3','criterio_inclusao' =>'Sinais e sintomas de asma previamente conhecida.'));
        $this->insert('queixa',array('apelido'=>'AVC – Acidente Vascular Cerebral','protocolo' =>'RC1','criterio_inclusao' =>'Paciente com sintomas de acidente vascular cerebral (AVC) que se iniciaram entre 3 e 4,5 horas'));
        $this->insert('queixa',array('apelido'=>'Cefaleia','protocolo' =>'RC6','criterio_inclusao' =>'Qualquer dor ao redor da cabeça não relacionada a nenhuma estrutura'));
        $this->insert('queixa',array('apelido'=>'Convulsão','protocolo' =>'RC7','criterio_inclusao' =>'Movimentos tônicos ou clônicos em crise tipo grande mal ou apresentando convulsão parcial.'));
        $this->insert('queixa',array('apelido'=>'Corpo Estranho','protocolo' =>'RC8','criterio_inclusao' =>'Presença de corpo estranho em qualquer parte da anatomia'));
        $this->insert('queixa',array('apelido'=>'Crise em Saúde Mental','protocolo' =>'RC9','criterio_inclusao' =>'Alterações agudas do comportamento e doença mental.'));
        $this->insert('queixa',array('apelido'=>'Diabetes','protocolo' =>'RC10','criterio_inclusao' =>'Pacientes sabidamente diabéticos, tipo I ou tipo II.'));
        $this->insert('queixa',array('apelido'=>'Diarréia e/ ou vômitos','protocolo' =>'RC11','criterio_inclusao' =>'Pacientes com diarréia e/ ou vômitos com ou sem sinais de desidratação.'));
        $this->insert('queixa',array('apelido'=>'Dispnéia em adulto ','protocolo' =>'RC12','criterio_inclusao' =>'Em todos os casos de dispnéia em paciente não asmático.'));
        $this->insert('queixa',array('apelido'=>'Dispnéia em criança ','protocolo' =>'RP1','criterio_inclusao' =>'Queixas de falta de ar na criança'));
        $this->insert('queixa',array('apelido'=>'Dor abdominal em criança ','protocolo' =>'RP2','criterio_inclusao' =>'Dor na região abdominal, com ou sem irradiação.'));
        $this->insert('queixa',array('apelido'=>'Dor cervical','protocolo' =>'RC14','criterio_inclusao' =>'Dor na região cervical, com ou sem irradiação'));
        $this->insert('queixa',array('apelido'=>'Dor lombar','protocolo' =>'RC15','criterio_inclusao' =>'Dor na região lombar, com ou sem irradiação.'));
        $this->insert('queixa',array('apelido'=>'Dor testicular','protocolo' =>'RC16','criterio_inclusao' =>'Dor na região escrotal'));
        $this->insert('queixa',array('apelido'=>'Dor torácica ','protocolo' =>'RC17','criterio_inclusao' =>'Dor torácica anterior, lateral ou posterior, com ou sem irradiação, com ou sem relação com a respiração.'));
        $this->insert('queixa',array('apelido'=>'Gestante em trabalho de parto ','protocolo' =>'RO2','criterio_inclusao' =>'Pacientes gestantes, em trabalho de parto ou alterações do curso normal da gestação.'));
        $this->insert('queixa',array('apelido'=>'Hemorragia digestiva','protocolo' =>'RC18','criterio_inclusao' =>'Pacientes apresentando sangramento digestivo, podendo estar vomitando sangue vivo ou alterado, ou evacuando sangue vivo ou alterado.'));
        $this->insert('queixa',array('apelido'=>'Intoxicação ou abstinência alcoólica','protocolo' =>'RC19','criterio_inclusao' =>'Uso agudo ou crônico, comprovado ou suspeito de álcool.'));
        $this->insert('queixa',array('apelido'=>'Mal súbito no adulto ','protocolo' =>'RC20','criterio_inclusao' =>'Desmaio, síncope ou mal estar no adulto.'));
        $this->insert('queixa',array('apelido'=>'Maus Tratos ','protocolo' =>'RM9','criterio_inclusao' =>'Caso suspeito ou efetivo de maus tratos a criança, adolescente ou idoso.'));
        $this->insert('queixa',array('apelido'=>'Mordeduras e picadas','protocolo' =>'RC21','criterio_inclusao' =>'Abrange desde picadas de insetos até mordeduras por grandes animais, inclusive humana.'));
        $this->insert('queixa',array('apelido'=>'Múltiplas Vítimas ou QBRNE','protocolo' =>'RT3','criterio_inclusao' =>'Em todos os incidentes com múltiplas vítimas relacionados ou não com produtos perigosos (químicos, radiológicos, nucleares e explosivos) ou agentes biológicos'));
        $this->insert('queixa',array('apelido'=>'Overdose e envenenamentos ','protocolo' =>'RT4','criterio_inclusao' =>'Relato de ingestão de substâncias tóxicas ou entorpecentes com sintomatologia importante'));
        $this->insert('queixa',array('apelido'=>'Palpitação','protocolo' =>'RC22','criterio_inclusao' =>'Sensação incômoda do coração estar batendo ou acelerado'));
        $this->insert('queixa',array('apelido'=>'PCR ','protocolo' =>'RM7','criterio_inclusao' =>'Solicitação para paciente em Etiologia ou Semiologia Potencialmente Grave'));
        $this->insert('queixa',array('apelido'=>'Politraumatismo ','protocolo' =>'RT7','criterio_inclusao' =>'humano em decorrência de lesões provocadas por forças externas, que podem ser tanto um objeto chocando-se contra o corpo humano quanto o corpo humano chocando-se contra um objeto'));
        $this->insert('queixa',array('apelido'=>'Problemas em extremidades ','protocolo' =>'RC24','criterio_inclusao' =>'Em quaisquer queixas ou lesões em membros superiores ou inferiores, inclusive dor ou trauma.'));
        $this->insert('queixa',array('apelido'=>'Problemas em olhos','protocolo' =>'RC25','criterio_inclusao' =>'Dor ou outras sensações nos olhos, incluindo alterações agudas na visão.'));
        $this->insert('queixa',array('apelido'=>'Problemas odontológicos','protocolo' =>'RC23','criterio_inclusao' =>'Abrange qualquer problema oral em dentes e/ ou gengivas.'));
        $this->insert('queixa',array('apelido'=>'Queda ','protocolo' =>'RT5','criterio_inclusao' =>'Queda da própria altura ou de altura.'));
        $this->insert('queixa',array('apelido'=>'Queimaduras e choque elétrico','protocolo' =>'RT6','criterio_inclusao' =>'Queimaduras de fonte elétrica, química ou por fogo, calor ou solar.'));
        $this->insert('queixa',array('apelido'=>'Remoção ','protocolo' =>'RM8','criterio_inclusao' =>'Solicitação de remoção interunidade de paciente'));
        $this->insert('queixa',array('apelido'=>'STV–Sangramento transvaginal','protocolo' =>'RO1','criterio_inclusao' =>'Perda de sangue, na gestação ou fora dela, por via vaginal.'));
        $this->insert('queixa',array('apelido'=>'TCE–Trauma cranioencefálico','protocolo' =>'RT8','criterio_inclusao' =>'Trauma na cabeça com alterações neurológicas e/ ou equimose mastóide ou periorbitária e/ ou otorragia/ rinorragia com ou sem politraumatismo'));
        $this->insert('queixa',array('apelido'=>'Trauma toracoabdominal','protocolo' =>'RT9','criterio_inclusao' =>'Trauma em tórax ou abdome com ou sem risco de morte, hemorragia ou dor.'));
    }

    public function safeDown()
    {
        $this->execute('ALTER DATABASE salute DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci');
        $this->execute('ALTER TABLE `queixa` CHANGE `apelido` `apelido` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL;');
        $this->execute('ALTER TABLE `queixa` CHANGE `protocolo` `protocolo` VARCHAR(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL;');
        $this->execute('ALTER TABLE `queixa` CHANGE `criterio_inclusao` `criterio_inclusao` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL;');

        $this->truncate('queixa');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171101_183621_insert_queixa_table cannot be reverted.\n";

        return false;
    }
    */
}
