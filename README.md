**Symfony version(s) affected**: 5.3.6

**Description**
When uploading to Loco by using `push` command, it appears (in Loco dashboard) dots have been replaced by hyphens, as `push` command seems to do this replacement and then fails once `pull` is done

**How to reproduce**
1. Create a project and install: `composer require symfony/translation` and Loco package by `composer require symfony/loco-translation-provider` and add configuration for _locales_ and _domains_ in `translations.yaml`. Also create a project in Loco (localise.biz) and configure its `API_KEY` for **read and write permissions** and place it in `.env` file (`LOCO_DSN`)
2. Create one controller and use `TranslatorInterface` to have at least one translatable keystring (with dots)
3. In the console: `debug/translation` to confirm there are missing strings (one in this case)
4. In the console: `symfony console translation:update en --force` to generate the local file under `translations` folder
5. In the console: `translation:push` to upload to Loco
6. Check in Loco that it was uploaded and appears incorrectly with hyphens and not with dots

**Additional context**
In the controller we have this line: `$translated = $translator->trans('index.home.msg');`

In the generated translations file under `/translations` folder we have these lines:
```
      <trans-unit id="FNdkzeB" resname="index.home.msg">
        <source>index.home.msg</source>
        <target>__index.home.msg</target>
      </trans-unit>
```

And in Loco we have this capture:
<img width="318" alt="Captura de pantalla 2021-08-05 a las 21 00 26" src="https://user-images.githubusercontent.com/2869841/128406234-b9646392-0640-42a9-a3ec-28ec5a6149bb.png">


