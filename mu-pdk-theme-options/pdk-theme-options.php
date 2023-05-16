<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

function load_custom_wp_admin_style() {
    // Enqueue your own styles and scripts
    wp_enqueue_style( 'custom_wp_admin_css', plugins_url( '/assets/css/toggle.css', __FILE__ ) );
    wp_enqueue_script( 'custom_wp_admin_js', plugins_url( '/assets/js/main.js', __FILE__ ), array( 'jquery' ) );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
    $basic_options_container = Container::make( 'theme_options', __( 'Theme Options' ) )
        ->set_page_file( 'theme-options' )
        ->set_icon( 'dashicons-welcome-widgets-menus' )
        ->set_page_menu_position( 2 )
        ->add_fields( array(
        Field::make( 'image', 'pdk_favicon', __( 'Favicon' ) )
            ->set_value_type( 'url' )
            ->set_help_text( 'Upload hier uw favicon. Afmeting: 32x32 pixels. Bestandstype: .ico, .png, .gif of .jpeg.' ),
        Field::make( 'checkbox', 'pdk_page_editor', __( 'WordPress Page Editor' ) )
            ->set_default_value( true )
            ->set_classes('switch-toggle')
            ->set_help_text( 'Hiermee kan de Page Editor van WordPress aan en uit worden gezet.' ),
        )
    );
    Container::make( 'theme_options', __( 'Klant gegevens' ) )
        ->set_page_parent( $basic_options_container ) // reference to a top level container
        ->add_fields( array(            
            Field::make( 'image', 'logo', 'Logo' )
                ->set_value_type( 'url' ),
            Field::make( 'text', 'company_name', 'Bedrijfsnaam' ),
            Field::make( 'text', 'street', 'Straat' )
                ->set_width(50),
            Field::make( 'text', 'number', 'Huisnummer' )
                ->set_width(50),
            Field::make( 'text', 'zipcode', 'Postcode' )
                ->set_width(50),
            Field::make( 'text', 'city', 'Plaatsnaam' )
                ->set_width(50),
            Field::make( 'text', 'phone', 'Telefoonnummer' )
                ->set_width(50),
            Field::make( 'text', 'email', 'E-mailadress' )
                ->set_width(50),
            Field::make( 'complex', 'socials', 'Socialmedia' )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields( array(
                    Field::make( 'text', 'hashtag', 'Aangepaste hashtag' )->set_width(33),
                    Field::make( 'text', 'url', 'URL pagina' )->set_width(33),
                )
            ),
        ) 
    );
    Container::make( 'theme_options', __( 'Handleiding' ) )
        ->set_page_parent( $basic_options_container ) // reference to a top level container
        ->add_tab( __( 'Algemeen' ), array(
            Field::make( 'html', 'crb_information_algemeen' )
                ->set_html( '<h1>Et ille ridens: Video, inquit, quid agas;</h1>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Immo istud quidem, inquam, quo loco quidque, nisi iniquum postulo, arbitratu meo. Non est enim vitium in oratione solum, sed etiam in moribus. </p>
                
                <p>Duo Reges: constructio interrete. At quicum ioca seria, ut dicitur, quicum arcana, quicum occulta omnia? Eorum enim est haec querela, qui sibi cari sunt seseque diligunt. <i>Nos cum te, M.</i> Qui autem esse poteris, nisi te amor ipse ceperit? Quid est, quod ab ea absolvi et perfici debeat? <i>Non est ista, inquam, Piso, magna dissensio.</i> Illum mallem levares, quo optimum atque humanissimum virum, Cn. </p>
                
                <blockquote cite="http://loripsum.net">
                    Bork
                </blockquote>
                
                
                <h3>Sed venio ad inconstantiae crimen, ne saepius dicas me aberrare;</h3>
                
                <p>Sic enim censent, oportunitatis esse beate vivere. Maximus dolor, inquit, brevis est. <i>Non enim ipsa genuit hominem, sed accepit a natura inchoatum.</i> Hoc dixerit potius Ennius: Nimium boni est, cui nihil est mali. Duo enim genera quae erant, fecit tria. Nam et complectitur verbis, quod vult, et dicit plane, quod intellegam; Quodsi ipsam honestatem undique pertectam atque absolutam. Rhetorice igitur, inquam, nos mavis quam dialectice disputare? </p>
                
                <p>Bork <b>Quorum altera prosunt, nocent altera.</b> Quid, de quo nulla dissensio est? <i>Eademne, quae restincta siti?</i> </p>
                
                <ol>
                    <li>Quae cum essent dicta, finem fecimus et ambulandi et disputandi.</li>
                    <li>Quae qui non vident, nihil umquam magnum ac cognitione dignum amaverunt.</li>
                    <li>Quicquid enim a sapientia proficiscitur, id continuo debet expletum esse omnibus suis partibus;</li>
                    <li>Deinde disputat, quod cuiusque generis animantium statui deceat extremum.</li>
                </ol>
                
                
                <p>Quare conare, quaeso. Aliter enim explicari, quod quaeritur, non potest. Etenim nec iustitia nec amicitia esse omnino poterunt, nisi ipsae per se expetuntur. Quia nec honesto quic quam honestius nec turpi turpius. <b>Bork</b> Si est nihil nisi corpus, summa erunt illa: valitudo, vacuitas doloris, pulchritudo, cetera. <i>Nulla erit controversia.</i> Quicquid porro animo cernimus, id omne oritur a sensibus; </p>
                
                <h2>Nam de isto magna dissensio est.</h2>
                
                <p><a href="http://loripsum.net/" target="_blank">Sed virtutem ipsam inchoavit, nihil amplius.</a> Qui non moveatur et offensione turpitudinis et comprobatione honestatis? <a href="http://loripsum.net/" target="_blank">Sed hoc sane concedamus.</a> Equidem e Cn. Hanc ergo intuens debet institutum illud quasi signum absolvere. Summum ením bonum exposuit vacuitatem doloris; Cur igitur, inquam, res tam dissimiles eodem nomine appellas? Nam, ut paulo ante docui, augendae voluptatis finis est doloris omnis amotio. </p>
                
                <ul>
                    <li>Ea, quae dialectici nunc tradunt et docent, nonne ab illis instituta sunt aut inventa sunt?</li>
                    <li>Quamquam ab iis philosophiam et omnes ingenuas disciplinas habemus;</li>
                    <li>At iam decimum annum in spelunca iacet.</li>
                </ul>')
            )
        )
        ->add_tab( __( 'Woocommerce' ), array(
            Field::make( 'html', 'crb_information_woocommerce' )
                ->set_html( '<h1>Nec vero hoc oratione solum, sed multo magis vita et factis et moribus comprobavit.</h1>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dicam de voluptate, nihil scilicet novi, ea tamen, quae te ipsum probaturum esse confidam. Ut necesse sit omnium rerum, quae natura vigeant, similem esse finem, non eundem. <a href="http://loripsum.net/" target="_blank">Poterat autem inpune;</a> Duo Reges: constructio interrete. De quibus cupio scire quid sentias. <i>Primum quid tu dicis breve?</i> </p>
                
                <h4>Sed tamen enitar et, si minus multa mihi occurrent, non fugiam ista popularia.</h4>
                
                <p>Non enim iam stirpis bonum quaeret, sed animalis. <b>At enim hic etiam dolore.</b> Qua ex cognitione facilior facta est investigatio rerum occultissimarum. Neque enim civitas in seditione beata esse potest nec in discordia dominorum domus; In omni enim animante est summum aliquid atque optimum, ut in equis, in canibus, quibus tamen et dolore vacare opus est et valere; <i>Quod quidem nobis non saepe contingit.</i> </p>
                
                <blockquote cite="http://loripsum.net">
                    Nec vero umquam summum bonum assequi quisquam posset, si omnia illa, quae sunt extra, quamquam expetenda, summo bono continerentur.
                </blockquote>
                
                
                <h3>Habes, inquam, Cato, formam eorum, de quibus loquor, philosophorum.</h3>
                
                <p>Possumusne ergo in vita summum bonum dicere, cum id ne in cena quidem posse videamur? Quae tamen a te agetur non melior, quam illae sunt, quas interdum optines. Habent enim et bene longam et satis litigiosam disputationem. <i>Summus dolor plures dies manere non potest?</i> Quis enim confidit semper sibi illud stabile et firmum permansurum, quod fragile et caducum sit? Quis enim confidit semper sibi illud stabile et firmum permansurum, quod fragile et caducum sit? Quia, cum a Zenone, inquam, hoc magnifice tamquam ex oraculo editur: Virtus ad beate vivendum se ipsa contenta est, et Quare? Fadio Gallo, cuius in testamento scriptum esset se ab eo rogatum ut omnis hereditas ad filiam perveniret. Ab his oratores, ab his imperatores ac rerum publicarum principes extiterunt. Pungunt quasi aculeis interrogatiunculis angustis, quibus etiam qui assentiuntur nihil commutantur animo et idem abeunt, qui venerant. Septem autem illi non suo, sed populorum suffragio omnium nominati sunt. <a href="http://loripsum.net/" target="_blank">Non est igitur summum malum dolor.</a> Quis autem de ipso sapiente aliter existimat, quin, etiam cum decreverit esse moriendum, tamen discessu a suis atque ipsa relinquenda luce moveatur? </p>
                
                <h2>Quid turpius quam sapientis vitam ex insipientium sermone pendere?</h2>
                
                <p>Sin kakan malitiam dixisses, ad aliud nos unum certum vitium consuetudo Latina traduceret. Atque haec coniunctio confusioque virtutum tamen a philosophis ratione quadam distinguitur. Id quaeris, inquam, in quo, utrum respondero, verses te huc atque illuc necesse est. Atque his de rebus et splendida est eorum et illustris oratio. <i>Certe, nisi voluptatem tanti aestimaretis.</i> Cur igitur easdem res, inquam, Peripateticis dicentibus verbum nullum est, quod non intellegatur? <a href="http://loripsum.net/" target="_blank">Non enim iam stirpis bonum quaeret, sed animalis.</a> Hic quoque suus est de summoque bono dissentiens dici vere Peripateticus non potest. </p>
                
                <ol>
                    <li>Ad corpus diceres pertinere-, sed ea, quae dixi, ad corpusne refers?</li>
                </ol>
                
                
                <p>Quae cum essent dicta, discessimus. <i>Quippe: habes enim a rhetoribus;</i> Quamquam id quidem, infinitum est in hac urbe; <i>Est, ut dicis, inquit;</i> Tum Piso: Atqui, Cicero, inquit, ista studia, si ad imitandos summos viros spectant, ingeniosorum sunt; Qua igitur re ab deo vincitur, si aeternitate non vincitur? Bonum appello quicquid secundurn naturam est, quod contra malum, nec ego solus, sed tu etiam, Chrysippe, in foro, domi; Utrum igitur tibi non placet, inquit, virtutisne tantam esse vim, ut ad beate vivendum se ipsa contenta sit? <i>Facillimum id quidem est, inquam.</i> </p>
                
                <ul>
                    <li>Honesta oratio, Socratica, Platonis etiam.</li>
                    <li>Nam quibus rebus efficiuntur voluptates, eae non sunt in potestate sapientis.</li>
                    <li>Nam illud vehementer repugnat, eundem beatum esse et multis malis oppressum.</li>
                    <li>Aliter enim nosmet ipsos nosse non possumus.</li>
                    <li>Atque hoc loco similitudines eas, quibus illi uti solent, dissimillimas proferebas.</li>
                    <li>Tu autem inter haec tantam multitudinem hominum interiectam non vides nec laetantium nec dolentium?</li>
                    <li>Restinguet citius, si ardentem acceperit.</li>
                </ul>
                
                
                <p><a href="http://loripsum.net/" target="_blank">Bork</a> In qua si nihil est praeter rationem, sit in una virtute finis bonorum; Qui bonum omne in virtute ponit, is potest dicere perfici beatam vitam perfectione virtutis; Ac ne plura complectar-sunt enim innumerabilia-, bene laudata virtus voluptatis aditus intercludat necesse est. Pauca mutat vel plura sane; Hic quoque suus est de summoque bono dissentiens dici vere Peripateticus non potest. Piso, familiaris noster, et alia multa et hoc loco Stoicos irridebat: Quid enim? Vives, inquit Aristo, magnifice atque praeclare, quod erit cumque visum ages, numquam angere, numquam cupies, numquam timebis. </p>'
            )
        )
    );
}

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once( 'vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}