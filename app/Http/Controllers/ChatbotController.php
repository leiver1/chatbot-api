<?php

namespace App\Http\Controllers;

use App\Models\FalseInput;
use Illuminate\Http\Request;


class ChatbotController extends Controller
{
      

    public function generateResponse($input, $roboter)
    {
        $Roboter = ucfirst($roboter);

    
        if (preg_match('/\b(hallo|hi|guten tag)\b/', $input)) {
            $greetings = [
                "Hallo! Wie kann ich Ihnen heute helfen?",
                "Guten Tag! Womit kann ich dienen?",
                "Hi! Was kann ich für Sie tun?"
            ];
            return $greetings[array_rand($greetings)];
        }
    
        if (preg_match('/\b(problem|fehler|defekt)\b/', $input) && !$roboter) {
            return "Es tut mir leid zu hören, dass Sie ein Problem haben. Können Sie mir mehr Details geben, wie den Produktnamen (Cleanbug, Windowfly, Gardenbeetle)?";
        }
    
        if ($roboter) {
            if ($roboter === 'windowfly') {
                if (preg_match('/\b(haftet|klebt|hält)\b/', $input)) {
                    if (preg_match('/\b(nicht|runter|)\b/', $input)) {
                        return 'Es scheint, dass der Haftungsmechanismus Ihres Windowfly nicht richtig funktioniert. Bitte erhöhen Sie die Haftungseinstellung in der zugehörigen App unter den Einstellungen für die Saugkraft. Sollte das Problem weiterhin bestehen, prüfen Sie, ob die Haftflächen sauber und frei von Staub sind.';
                    } else if (preg_match('/\b(zu sehr)\b/', $input)) {
                        return 'Falls Ihr Windowfly zu stark an der Oberfläche haftet, empfehle ich, die Haftungseinstellung in der App zu reduzieren. Dies verhindert Schäden an Ihren Fenstern und erleichtert das Abnehmen des Gerätes.';
                    }
                } else if (preg_match('/\b(fällt)\b/', $input) && preg_match('/\b(runter|ab)\b/', $input)) {
                    return 'Es tut mir sehr leid zu hören, dass Ihr Windowfly herunterfällt. Bitte überprüfen Sie, ob die Saugnäpfe vollständig sauber und intakt sind. Sollte das Problem weiterhin bestehen, könnte dies auf ein mechanisches Problem hinweisen. Kontaktieren Sie bitte unseren Kundensupport für weitere Hilfe.';
                } else if (preg_match('/\b(geht|kommt|bekomme)\b/', $input)) {
                    if (preg_match('/\b(nicht)\b/', $input)) {
                        if (preg_match('/\b(ab|runter)\b/', $input)) {
                            return 'Wenn Ihr Windowfly sich nicht von der Oberfläche löst, stellen Sie bitte sicher, dass die Funktion zum Lösen in der App aktiviert ist. Sollte das Problem anhalten, könnte dies auf ein technisches Problem hindeuten.';
                        } else if (preg_match('/\b(aus)\b/', $input)) {
                            return 'Es klingt, als ob Ihr Windowfly sich nicht ausschalten lässt. Bitte versuchen Sie, das Gerät über die App auszuschalten. Wenn dies fehlschlägt, trennen Sie das Gerät von der Stromversorgung und kontaktieren Sie unseren Support.';
                        }
                    } else if (preg_match('/\b(aus)\b/', $input)) {
                        return 'Wenn Ihr Windowfly unerwartet ausgeht, könnte dies ein Zeichen für ein Stromversorgungsproblem sein. Überprüfen Sie bitte die Batterie oder die Stromversorgung und stellen Sie sicher, dass alles korrekt angeschlossen ist.';
                    }
                } else if (preg_match('/\b(problem|fehler|defekt|kaputt|schwierigkeiten|update|updaten)\b/', $input)) {
                    if (preg_match('/\b(software)\b/', $input)) {
                        return "{$Roboter} scheint ein Softwareproblem zu haben. Ich empfehle Ihnen, den Roboter auf die Werkseinstellungen zurückzusetzen. Falls das Problem weiterhin besteht, wenden Sie sich bitte an unseren Support für eine detailliertere Diagnose und mögliche Updates.";
                    }
                    if (preg_match('/\b(hardware)\b/', $input)) {
                        return "{$Roboter} könnte ein Hardwareproblem haben. Überprüfen Sie alle sichtbaren Komponenten auf Schäden. Falls Teile beschädigt sind oder das Problem weiterhin auftritt, kontaktieren Sie bitte unseren Support für eine Reparatur oder den Austausch von Teilen.";
                    }
                    return "Ich habe Ihr Problem nicht ganz verstanden. Könnten Sie bitte das Problem mit Ihrem {$Roboter} genauer beschreiben? Unser Support-Team erreichen Sie unter bug.support@gmail.com, sie helfen Ihnen gerne weiter.";
                } else {
                    return 'Es tut mir leid zu hören, dass Sie Probleme mit Ihrem Windowfly haben. Können Sie bitte nähere Angaben zu den Schwierigkeiten machen? Je genauer Sie das Problem beschreiben, desto besser kann ich Ihnen helfen.';
                }
            }



            
            else if ($roboter === 'cleanbug') {
                if (preg_match('/\b(saugt|wischt|putzt)\b/', $input)) {
                    if (preg_match('/\b(nicht|schlecht)\b/', $input)) {
                        return 'Wenn Ihr Cleanbug nicht effektiv saugt oder wischt, überprüfen Sie bitte, ob der Auffangbehälter voll oder die Bürsten verstopft sind. Reinigen Sie diese Komponenten regelmäßig, um eine optimale Leistung zu gewährleisten.';
                    } else if (preg_match('/\b(zu stark|zu viel)\b/', $input)) {
                        return 'Wenn Sie finden, dass Ihr Cleanbug zu stark saugt oder die Böden zu nass hinterlässt, passen Sie bitte die entsprechenden Einstellungen in der App an. Reduzieren Sie die Saugkraft oder die Wassermenge für den Wischmodus.';
                    }
                
            } else if (preg_match('/\b(geht)\b/', $input) && preg_match('/\b(aus)\b/', $input)) {
                return 'ohhh dann mach ihn an';
            }
                
                
                else if (preg_match('/\b(steigt|treppen)\b/', $input) && preg_match('/\b(nicht)\b/', $input)) {
                    return 'Wenn Ihr Cleanbug Schwierigkeiten hat, Treppen zu steigen, stellen Sie sicher, dass keine kleinen Objekte oder Staubpartikel die Sensoren blockieren. Überprüfen Sie auch, ob die Software auf dem neuesten Stand ist, da dies die Navigationsfähigkeit verbessern kann.';
                } else if (preg_match('/\b(lädt|aufladen|batterie)\b/', $input)) {
                    if (preg_match('/\b(nicht)\b/', $input)) {
                        return 'Wenn Ihr Cleanbug nicht auflädt, überprüfen Sie bitte, ob die Ladestation richtig angeschlossen ist und keine Fremdkörper die Kontakte blockieren. Es könnte auch hilfreich sein, die Kontakte vorsichtig zu reinigen.';
                    }
                } else if (preg_match('/\b(problem|fehler|defekt|kaputt|schwierigkeiten|update|updatet)\b/', $input)) {
                    if (preg_match('/\b(software)\b/', $input)) {
                        return "{$Roboter} scheint ein Softwareproblem zu haben. Ein Zurücksetzen auf die Werkseinstellungen könnte helfen. Wenn das Problem weiterhin besteht, kontaktieren Sie bitte unseren Support.";
                    } else if (preg_match('/\b(hardware)\b/', $input)) {
                        return "{$Roboter} könnte ein Hardwareproblem haben. Bitte überprüfen Sie alle sichtbaren Komponenten auf Schäden. Wenn Teile beschädigt sind oder das Problem weiterhin auftritt, wenden Sie sich an unseren Kundendienst.";
                    }
                    return "Ich habe Ihr Problem nicht ganz verstanden. Könnten Sie bitte das Problem mit Ihrem {$Roboter} genauer beschreiben? Unser Support-Team erreichen Sie unter bug.support@gmail.com, sie helfen Ihnen gerne weiter.";
                } else {
                    return 'Es tut mir leid zu hören, dass Sie Probleme mit Ihrem Cleanbug haben. Können Sie bitte nähere Angaben zu den Schwierigkeiten machen?';
                }
            }




            
            else if ($roboter === 'gardenbeetle') {
                if (preg_match('/\b(mäht|unkraut)\b/', $input)) {
                    if (preg_match('/\b(nicht)\b/', $input)) {
                        return 'Wenn Ihr Gardenbeetle den Rasen nicht mäht oder das Unkraut nicht effektiv entfernt, überprüfen Sie bitte, ob die Schneidklingen scharf und frei von Blockaden sind. Stellen Sie außerdem sicher, dass die Sensoren sauber sind, um eine korrekte Navigation zu gewährleisten.';
                    }
                
                } else if (preg_match('/\b(geht)\b/', $input) && preg_match('/\b(aus)\b/', $input)) {
                    return 'ohhh dann mach ihn an';
                }
                
                else if (preg_match('/\b(batterie|aufladen)\b/', $input)) {
                    if (preg_match('/\b(nicht)\b/', $input)) {
                        return 'Wenn der Gardenbeetle nicht auflädt, stellen Sie sicher, dass die Ladestation korrekt angeschlossen ist und prüfen Sie die Batteriekontakte auf Verschmutzungen. Es könnte notwendig sein, die Batterie zu ersetzen, wenn sie ihre Ladekapazität verliert.';
                    }
                } else if (preg_match('/\b(problem|fehler|defekt|kaputt)\b/', $input)) {
                    if (preg_match('/\b(software)\b/', $input)) {
                        return "{$Roboter} scheint ein Softwareproblem zu haben. Bitte versuchen Sie einen Neustart und prüfen Sie, ob Updates verfügbar sind. Falls das Problem weiterhin besteht, wenden Sie sich an unseren Support.";
                    } else if (preg_match('/\b(hardware)\b/', $input)) {
                        return "{$Roboter} könnte ein Hardwareproblem haben. Überprüfen Sie auf sichtbare Schäden und stellen Sie sicher, dass keine Fremdkörper die Bewegung behindern. Kontaktieren Sie unseren Support für weitere technische Unterstützung.";
                    }
                    return "Ich habe Ihr Problem nicht ganz verstanden. Könnten Sie bitte das Problem mit Ihrem {$Roboter} genauer beschreiben? Unser Support-Team erreichen Sie unter bug.support@gmail.com, sie helfen Ihnen gerne weiter.";
                } else {
                    return 'Es tut mir leid zu hören, dass Sie Probleme mit Ihrem Gardenbeetle haben. Können Sie bitte genauere Informationen zu den Schwierigkeiten geben?';
                }
            }
            
        }
        
    
        $fallbacks = [
            "Entschuldigung, ich habe das nicht verstanden. Können Sie das wiederholen?",
            "Ich bin mir nicht sicher, wie ich darauf antworten soll. Können Sie Ihre Anfrage näher erläutern?",
            "Könnten Sie bitte Ihre Frage anders formulieren? Ich bin hier, um zu helfen!"
        ];
        return $fallbacks[array_rand($fallbacks)];
    }
    

    
    protected  $responses = [
        'hallo' => 'Hallo! Ich freue mich, Ihnen behilflich zu sein. Wie kann ich Ihnen heute weiterhelfen?',
        'welche produkte bietet bugland ltd. an?' => 'Wir bieten eine Reihe innovativer Smart-Home-Technologien an, darunter den Cleanbug, einen programmierbaren Saug- und Wischroboter, die Windowfly, ein selbstständiges Reinigungsgerät für Fenster, und den Gardenbeetle, der autonom den Rasen mäht und Unkraut entfernt.',
        'wie unterscheiden sich die produkte von bugland ltd. von anderen auf dem markt?' => 'Unsere Produkte zeichnen sich durch ihre hohe Funktionalität, einfache Konfiguration und intuitive Bedienung aus. Sie bieten eine effiziente Lösung für Haus- und Gartenpflege sowohl für den privaten Gebrauch als auch für professionelle Reinigungs- und Gartenpflegebetriebe.',
        'kann ich die produkte von bugland ltd. auch in meinem unternehmen verwenden?' => 'Ja, unsere Produkte eignen sich sowohl für den Einsatz im Privathaushalt als auch in Unternehmen. Sie sind flexibel einsetzbar und bieten effiziente Lösungen für die Reinigung und Pflege von Innenräumen sowie Außenbereichen wie Gärten und Fenster.',
        'bietet bugland ltd. schulungen oder tutorials für die nutzung der produkte an?' => 'Ja, wir bieten Schulungen und Tutorials an, um sicherzustellen, dass Sie das Beste aus Ihren BUGLAND-Produkten herausholen können. Diese können je nach Bedarf persönlich, online oder in Form von Videos sein.',
        'wie sieht es mit der garantie für die bugland-produkte aus?' => 'Alle unsere Produkte werden mit einer standardmäßigen Garantie geliefert, die Ihnen Sicherheit und Schutz bietet. Details zur Garantie finden Sie in den Produktunterlagen oder können bei unserem Kundenservice erfragt werden.',
        'können die bugland-produkte in mein bestehendes smart-home-system integriert werden?' => 'Ja, unsere Produkte sind kompatibel mit den meisten gängigen Smart-Home-Systemen. Sie können problemlos in Ihr vorhandenes System integriert werden, um eine nahtlose Steuerung und Automatisierung zu ermöglichen.',
        'gibt es eine mobile app für die steuerung der bugland-produkte?' => 'Ja, wir bieten eine mobile App an, über die Sie Ihre BUGLAND-Produkte bequem steuern und überwachen können. Die App ist für iOS und Android verfügbar und bietet eine benutzerfreundliche Oberfläche für eine einfache Bedienung.',
        'bietet bugland ltd. regelmäßige software-updates für seine produkte an?' => 'Ja, wir veröffentlichen regelmäßig Software-Updates, um die Leistung und Funktionalität unserer Produkte zu verbessern. Diese Updates können neue Funktionen hinzufügen, Fehler beheben oder die Sicherheit erhöhen.',
        'sind die bugland-produkte energieeffizient?' => 'Ja, unsere Produkte sind darauf ausgelegt, energieeffizient zu sein und helfen somit, Energiekosten zu senken. Sie verwenden fortschrittliche Technologien, um die Leistung zu optimieren und den Energieverbrauch zu minimieren.',
        'bietet bugland ltd. auch serviceleistungen wie wartung und reparatur an?' => 'Ja, wir bieten Serviceleistungen wie Wartung, Reparatur und Ersatzteile für unsere Produkte an. Unser Kundenservice-Team steht Ihnen zur Verfügung, um bei allen Fragen oder Problemen zu helfen und sicherzustellen, dass Ihre BUGLAND-Produkte optimal funktionieren.',
        'wie kann ich feedback zu meinen bugland-produkten geben?' => 'Wir schätzen Ihr Feedback sehr! Sie können uns Feedback entweder direkt über unsere Website, per E-Mail oder telefonisch mitteilen. Wir nehmen Ihr Feedback ernst und verwenden es, um unsere Produkte und Dienstleistungen kontinuierlich zu verbessern.',
        'bietet bugland ltd. rabatte oder sonderangebote für seine produkte an?' => 'Ja, wir bieten regelmäßig Rabatte und Sonderangebote für unsere Produkte an. Diese können je nach Jahreszeit, Aktion oder Verfügbarkeit variieren. Halten Sie daher unsere Website oder unsere Social-Media-Kanäle im Auge, um über aktuelle Angebote informiert zu bleiben.',
        'wie kann ich bugland ltd. kontaktieren, wenn ich weitere fragen habe oder unterstützung benötige?' => 'Sie können uns jederzeit per E-Mail, Telefon oder über unsere Website kontaktieren. Unser Kundenservice-Team steht Ihnen gerne zur Verfügung, um Ihnen bei Fragen oder Problemen weiterzuhelfen und Unterstützung anzubieten.',
        'bieten sie auch internationalen versand an?' => 'Ja, wir bieten internationalen Versand für unsere Produkte an. Bitte beachten Sie jedoch, dass zusätzliche Versandkosten und Zollgebühren anfallen können, abhängig von Ihrem Standort und den örtlichen Vorschriften.',
        'gibt es eine rückgaberegelung für bugland-produkte?' => 'Ja, wir bieten eine Rückgaberegelung für unsere Produkte an. Bitte überprüfen Sie unsere Rückgaberichtlinien auf unserer Website oder kontaktieren Sie unseren Kundenservice für weitere Informationen.',
        'kann ich bugland-produkte auch in örtlichen geschäften kaufen?' => 'Ja, unsere Produkte sind in ausgewählten Einzelhandelsgeschäften erhältlich. Bitte verwenden Sie unseren Filialfinder auf unserer Website, um ein Geschäft in Ihrer Nähe zu finden.',
        'bietet bugland ltd. auch kundenspezifische lösungen an?' => 'Ja, wir bieten kundenspezifische Lösungen für bestimmte Anforderungen oder Projekte an. Bitte kontaktieren Sie unser Vertriebsteam, um mehr über unsere maßgeschneiderten Lösungen zu erfahren.',
        'wie kann ich sicherstellen, dass ich meine bugland-produkte richtig konfiguriere und nutze?' => 'Keine Sorge, unsere Produkte sind einfach zu konfigurieren und zu bedienen. Jedes Produkt wird mit einer detaillierten Anleitung geliefert, und unser Kundenservice steht Ihnen jederzeit zur Verfügung, um bei Fragen oder Problemen zu helfen.',
        'bieten sie auch leasingoptionen für ihre produkte an?' => 'Ja, wir bieten Leasingoptionen für unsere Produkte an. Bitte kontaktieren Sie unser Vertriebsteam, um mehr über unsere Leasingangebote zu erfahren.',
        'wie unterscheidet sich der windowfly von anderen fensterreinigungsgeräten auf dem markt?' => 'Der Windowfly zeichnet sich durch seine fortschrittliche Technologie und seine intelligente Steuerung aus. Er reinigt Fenster automatisch und effizient, ohne dass Sie eine Leiter oder andere Geräte benötigen. Zudem ist der Windowfly einfach zu bedienen und bietet eine gründliche Reinigung ohne Streifen oder Rückstände.',
        'welche arten von fenstern kann der windowfly reinigen?' => 'Der Windowfly ist für die meisten Arten von Fenstern geeignet, einschließlich Standard-Fenstern, Schiebefenstern, Glastüren, Spiegeln und mehr. Er kann sowohl vertikale als auch horizontale Oberflächen reinigen und ist flexibel einsetzbar.',
        'ist der windowfly sicher zu verwenden?' => 'Ja, der Windowfly wurde mit Sicherheit als oberster Priorität entwickelt. Er verfügt über eingebaute Sensoren und Sicherheitsfunktionen, um Unfälle zu vermeiden. Darüber hinaus ist das Gerät robust und stabil konstruiert, um eine zuverlässige Leistung zu gewährleisten.',
        'welche funktionen hat der gardenbeetle?' => 'Der Gardenbeetle ist ein autonomer Rasenmäher und Unkrautentferner, der Ihnen die lästige Gartenarbeit abnimmt. Er kann den Rasen automatisch mähen, Unkraut erkennen und entfernen sowie den Rasen düngen, um ein gesundes Wachstum zu fördern.',
        'ist der gardenbeetle für alle gartengrößen geeignet?' => 'Ja, der Gardenbeetle ist für Gärten verschiedener Größen geeignet. Er kann problemlos in kleinen, mittleren und großen Gärten eingesetzt werden und passt sich den Geländebedingungen an, um eine effiziente Rasenpflege zu gewährleisten.',
        'wie lange dauert es, bis der gardenbeetle den rasen mäht?' => 'Die Dauer, bis der Gardenbeetle den Rasen mäht, hängt von der Größe des Gartens und anderen Faktoren ab. In der Regel kann der Gardenbeetle den Rasen in relativ kurzer Zeit mähen und dabei autonom navigieren, um eine gleichmäßige Abdeckung zu gewährleisten.',
        'was sind die hauptmerkmale des cleanbug?' => 'Der Cleanbug ist ein programmierbarer Saug- und Wischroboter, der mit seinen intelligenten Funktionen und seiner Fähigkeit, Treppen zu steigen, herausragt. Er bietet eine gründliche Reinigung von Böden und kann sowohl saugen als auch wischen, um Ihren Wohnraum makellos zu halten.',
        'ist der cleanbug einfach zu bedienen?' => 'Ja, der Cleanbug wurde entwickelt, um benutzerfreundlich zu sein. Mit seiner intuitiven Bedienung und einfachen Programmierung können Sie den Cleanbug leicht konfigurieren und steuern, um Ihre Reinigungsanforderungen zu erfüllen.',
        'welche arten von böden kann der cleanbug reinigen?' => 'Der Cleanbug ist vielseitig einsetzbar und kann eine Vielzahl von Böden reinigen, darunter Hartholz, Fliesen, Laminat, Teppiche und mehr. Er passt sich automatisch an verschiedene Oberflächen an und bietet eine effiziente Reinigung in jedem Raum.',
        'kann der cleanbug in mehrstöckigen häusern verwendet werden?' => 'Ja, der Cleanbug ist in der Lage, Treppen zu steigen, was ihn ideal für den Einsatz in mehrstöckigen Häusern macht. Sie können ihn problemlos zwischen den Etagen bewegen und ihn in verschiedenen Bereichen Ihres Hauses einsetzen.',
        'bietet der cleanbug eine fernbedienung oder eine app-steuerung?' => 'Ja, der Cleanbug kann sowohl über eine Fernbedienung als auch über eine mobile App gesteuert werden. Sie können ihn bequem von Ihrem Smartphone oder Tablet aus steuern und programmieren, um Reinigungspläne zu erstellen und die Reinigungseinstellungen anzupassen.',
        'wie lange dauert es, bis der cleanbug den raum gereinigt hat?' => 'Die Reinigungszeit des Cleanbug hängt von der Größe des Raums und anderen Faktoren ab. In der Regel kann er jedoch einen Raum effizient und gründlich reinigen und dabei Hindernisse erkennen und umfahren, um eine optimale Reinigung zu gewährleisten.',
        'bietet bugland ltd. eine garantie für den cleanbug?' => 'Ja, alle Produkte von BUGLAND Ltd., einschließlich des Cleanbug, werden mit einer standardmäßigen Garantie geliefert. Bitte überprüfen Sie die Garantiebedingungen in den Produktunterlagen oder kontaktieren Sie unseren Kundenservice für weitere Informationen.',
        'wie oft sollte der cleanbug gewartet werden?' => 'Um eine optimale Leistung Ihres Cleanbug zu gewährleisten, empfehlen wir regelmäßige Wartungsintervalle gemäß den Anweisungen in der Bedienungsanleitung. Dies kann die Reinigung der Bürsten und Filter sowie die Überprüfung der Sensoren und anderer Komponenten umfassen.',
        'kann der cleanbug auch pet-haare aufnehmen?' => 'Ja, der Cleanbug ist wirksam bei der Entfernung von Tierhaaren auf verschiedenen Bodenbelägen. Dank seiner leistungsstarken Saugkraft und effizienten Reinigungsbürsten kann er Tierhaare effektiv aufnehmen und den Boden gründlich reinigen.',
        'bietet bugland ltd. ersatzteile für den cleanbug an?' => 'Ja, wir bieten eine Auswahl an Ersatzteilen und Zubehör für den Cleanbug an, darunter Bürsten, Filter und Batterien. Sie können diese Teile entweder direkt über unsere Website bestellen oder sich an unseren Kundenservice wenden, um Unterstützung zu erhalten.',
        'wie kann ich den cleanbug am besten reinigen?' => 'Um den Cleanbug optimal zu reinigen, empfehlen wir, regelmäßig die Bürsten, Filter und andere Komponenten zu überprüfen und zu reinigen. Dies kann dazu beitragen, die Lebensdauer Ihres Cleanbug zu verlängern und seine Leistung zu optimieren.',
    ];


    protected $falsyResponse = [
        'Entschuldige. Das habe ich nicht verstanden?',
        'Könntest du das Wiederholen?',
        'Das habe ich nicht ganz verstanden. Könntest du das wiederholen?',
        'Ich bin mir nicht sicher, ob ich das richtig verstanden habe. Kannst du es bitte noch einmal erklären?',
        'Hmm, das ist mir nicht ganz klar. Könntest du mir mehr Details geben?',
        'Tut mir leid, ich bin mir nicht sicher, was du meinst. Kannst du das bitte anders formulieren?',
        'Ich habe Schwierigkeiten, das zu verstehen. Könntest du mir mehr Kontext geben?',
        'Das ist ein bisschen unklar für mich. Kannst du bitte genauer sein?',
        'Entschuldigung, das habe ich nicht erfassen können. Könntest du es nochmal anders ausdrücken?',
        'Kannst du das bitte nochmal sagen? Ich bin mir nicht sicher, ob ich alles richtig aufgenommen habe.',
        'Ich bin mir nicht sicher, was du meinst. Könntest du es etwas klarer formulieren?',
        'Das habe ich nicht ganz erfassen können. Könnten wir das Thema vielleicht etwas einfacher angehen?',
        'Ich glaube, ich brauche ein wenig mehr Information, um das richtig zu verstehen. Kannst du noch etwas hinzufügen?'
    ];
    

    public function getResponse(Request $request){
        $successResponse = true;
        $radnomIndex = rand(0, count($this->falsyResponse)-1);
        $randomMessage = $this->falsyResponse[$radnomIndex];
        $input = $request->input('bot');

        if (!isset($this->responses[$input])) {
            FalseInput::create(['input' => $input]); 
            $successResponse = false;
        }else{
            $successResponse = true;
        }
        return response()->json([
            'response' => $this->responses[$input] ?? $randomMessage,
            'success' => $successResponse,


        ]);
    }


    public function test(){
        return response()->json([
            "test" => "Helloworld"
        ]);
    }
    public function test2(){
        return response()->json([
            "test2" => "Helloworld2"
        ]);
    }



    public function getResponse2 (Request $request){
        $input = strtolower($request->input('bot'));
        
        $roboter = $request->input('roboter');

        $response = $this->generateResponse($input, $roboter);


        return response()->json([
            'user_input' => $input,
            'response' => $response,
            // 'roboter' => $roboter
        ]);

    }
}
