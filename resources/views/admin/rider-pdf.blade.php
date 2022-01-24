<!DOCTYPE html>
<html>
    <head>
        <meta content="text/html;charset=utf-8" http-equiv="Content-Type" /> 
        <meta content="utf-8" http-equiv="encoding" />
        <title>Fiche technique Muertissima</title>
        <style type="text/css">
            body {
                font-family: sans-serif;
            }
            .pageBreak {
                page-break-before: always;
            }
            @page {
                margin: 100px 25px;
            }
            footer {
                position: fixed; 
                bottom: -60px; 
                left: 0px; 
                right: 0px;
                height: 50px; 

                /** Extra personal styles **/
                border-top: 1px solid #000;
                text-align: center;
                line-height: 35px;
                font-size: 11px;
            }
            table {
                width: 100%;
                font-size: 12px;
            }
            .even {
                background: #eee;
            }
        </style>
    </head>
    <body>
        <footer>
            <img src="{{ public_path('images/logo-white-small.png') }}" height="30px" style="margin-top: 12px" /> - Fiche technique - Copyright &copy; {{ date("Y") }} Simon PERRIN
        </footer>

        <main>
            <img src="{{ public_path('images/logo-white.png') }}" width="100%" />

            <center>
                <br />
                <br />
                <h1>Fiche technique</h1>
                <p>Générée le : {{ date('Y-m-d H:i:s') }}</p>
            </center>

            <div class="pageBreak"></div>

            <h1>Présentation générale</h1>
            {!! $datasheet->general_info !!}
            <h3>Membres</h3>
            <ul>
            @foreach($bandMembers as $member)
                <li><strong>{{ $member->name }}</strong> : {{ $member->instruments }}</li>
            @endforeach
            </ul>
            <h3>Staff et accompagnateurs</h3>
            {!! $datasheet->staff !!}
            <h3>Langue d'échange</h3>
            {!! $datasheet->languages !!}
            <br />
            <br />
            {!! $datasheet->networks !!}

            <div class="pageBreak"></div>

            <h1>Matériel</h1>
            <table border="1">
                <tr>
                    @foreach($stuffSections as $stuffSection)
                    <th style="width: {{ abs(100 / count($stuffSections)) }}%">{{ $stuffSection->name }}</th>
                    @endforeach
                </tr>
                <tr>
                    @foreach($stuffSections as $stuffSection)
                    <td style="vertical-align: top;">
                        @foreach($stuff as $stuffItem)
                            @if ($stuffItem->section_id != $stuffSection->id)
                                @continue
                            @endif
                            <h4>{{ $stuffItem->instrument_name ?? $bandMembers->find($stuffItem->band_member_id)->name.' : '.$bandMembers->find($stuffItem->band_member_id)->instruments }}</h4>
                            {!! $stuffItem->content !!}
                        @endforeach
                    </td>
                    @endforeach
                </tr>
            </table>

            <div class="pageBreak"></div>

            <h1>Patchlist</h1>
            <table border="1" cellspacing="0">
                <tr>
                    <th>Entrée</th>
                    <th>Musicien</th>
                    <th>Instrument</th>
                    <th>Micro</th>
                    <th>Pied de micro</th>
                </tr>
                @foreach($patchlist as $patch)
                <tr>
                    <td>{{ $patch->input_number }}</td>
                    <td>{{ $bandMembers->find($patch->band_member_id)->name }}</td>
                    <td>{{ $patch->instrument_name }}</td>
                    <td>{{ $patch->microphone_type }}</td>
                    <td>{{ $patch->microphone_stand_size }}</td>
                </tr>
                @endforeach
            </table>

            <div class="pageBreak"></div>

            <h1>Rider</h1>
            <table border="0" cellspacing="10">
                <tr>
                    <td style="vertical-align: top; text-align: justify;">
                        @foreach($rider as $riderSection)
                        <h4 style="margin-bottom: 0">{{ $riderSection->title }}</h4>
                        <div style="margin-top: 0">{!! $riderSection->content !!}</div>
                            @if($loop->iteration % 5 == 0)
                    </td>
                    <td style="vertical-align: top; text-align: justify;">
                            @endif
                        @endforeach
                    </td>
                </tr>
            </table>

            <div class="pageBreak"></div>

            <h1>Plan de scène</h1>
            @include('admin.scene-plan', ['isPdf' => true])
        </main>
    </body>
</html>