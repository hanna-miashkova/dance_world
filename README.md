# dance_world

## Używane frameworki:
* Symfony4
* Bootstrap4

## Link do aplikacji :
https://gentle-everglades-53070.herokuapp.com/

## Instrukcja do uruchomienia lokalnie: 
* Aby uruchomić aplikację lokalnie trzeba pobrać xampp, następnie dodać folder (nazwa „dance_world”) z całą aplikacją do folderu htdocs po otwarciu folderu xampp
* Uruchomić Apache i MySQL
* W przeglądarce wpisać „http://localhost/dance_world/public/”
* W celu przeglądania lokalnie danych na stronie co są pobierane z bazy danych trzeba w .env wpisać:
DATABASE_URL=mysql://root:@127.0.0.1:3306/dance_world?serverVersion=5.7 
utworzyć w PhpMyAdmin bazę „dance_world” i wypełnić ją przykładowymi danymi. 

## zajęcia 4 :
Stworzono stronę startową oraz połączono projekt z BD. Głównie praca była przeprowadzona ze stylem strony. Templatka „onas.html.twig” zawiera wszystkie elementy strony „O nas”, rozszerza ona templatkę „base. html.twig” którą zawiera „navbar. html.twig”. Arkusz styli znajduje się w folderze public. Stworzono również kontroller  „MainPageController” dla templatek bazowych. (na razie na stronie głównej w sliderze jest tylko pierwsze zdjęcie dobrane do strony, reszta będzie zmieniona żeby pasowała kolorystycznie)

## zajęcia 5: 
Stworzono stronę logowania, dodano nowe opcje w menu widoczne po zalogowaniu, jest wylogowanie użytkownika i widok strony rejestracji. Problem się pojawił z encodowaniem hasła i podziałem użytkowników na role, dlatego w celu poprawnego działania zostawimy to na następne zajęcie. Również są sprawdzane niektóre warunki przy logowaniu oraz rejestracji. Templatka „login.html.twig” i „register.html.twig” odpowiednio. Do nich SecurityController. Do walidacji danych w folderze security klasa UzytkownikAuthenticator.

## zajęcia 6:
Skończono rejestrację użytkownika, dodano nowe pola i ograniczenia. Zmiany możemy zobaczyć w "register.html.twig" i w SecurityController funkcja register. Zrobiono również panel użytkownika: zdjęcie, dane, umijętności które użytkownik może zmieniać i wybierać za pomocą popup. Templatka profil.html.twig oraz w MainPageController funkcja infoProfil.

## zajęcia 7: 
Widok listy szkół, który zawiera nazwę szkoły, miasto, opis. Lista jest posortowana alfabetycznie wg nazwy szkoły. Templatka do tego widoku "listaSkol.html.twig", controller "ListaSzkolController". Do zrealizowania należało dodać encję Szkoła i Miasto. Są powiązane relacją OneToMany. Folder .idea został dodany do gitignore, ale nie wiem czemu nadal znajduje się w repozytorium. 

## zajęcia 8: 
Wdrożenie aplikacji na Heroku. W projekcie baza danych MySQL przy użyciu dodatku JawsDB. Client - HeidiSQL. Link do aplikacji "https://gentle-everglades-53070.herokuapp.com/" 

## zajęcia 9: 
Utworzono widok szkoły tańca po wyborze z listy szkół. Dodane zostały również kategorie tańca którymi się zajmuje szkoła po stworzeniu relacji ManyToMany z encją Umiejętności. Widok szkół jest w templatce "szkolaInfo.html.twig" i kontroller do tego "SzkolaInfoController.php". Widok się składa z wideo o szkole z YT, pełnego opisu, w footerze jest lokalizacja z goole maps i dane do kontaktu wraz ze stroną internetową. Postanowiłam dodać również do widoku szkoły jej instruktorów. Na razie są to sztywnie wybrane obrazki z opisem.

