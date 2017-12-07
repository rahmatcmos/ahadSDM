<?php
/* @var $this PegawaiController */
/* @var $model Pegawai */

$this->breadcrumbs = [
    'Pegawai' => ['index'],
    $model->nama,
];

$this->pageHeader['title'] = 'View';
$this->pageHeader['desc'] = 'Pegawai';
$this->pageHeader['boxTitle'] = 'Pegawai: ' . $model->nama;

$this->pageTitle = Yii::app()->name . ' - ' . $this->pageHeader['desc'] . ' ' . $model->nama;
?>
<div class="row">
    <div class="col-sm-12 col-lg-6">
        <?php
        $pegawai = [
            'nip',
            'nama',
            'alamat',
            'tanggal_lahir',
            'telpon',
            'perusahaan',
        ];
        $unitKerja = [];
        if (!$sudahPernahMutasi) {
            $unitKerja = [
                [
                    'label' => 'Cabang',
                    'name' => 'cabang.nama'
                ],
                [
                    'label' => 'Bagian',
                    'name' => 'bagian.nama'
                ],
                [
                    'label' => 'Jabatan',
                    'name' => 'jabatan.nama'
                ],
            ];
        }

        $this->widget('BDetailView', [
            'data' => $model,
            'attributes' => array_merge($pegawai, $unitKerja)
        ]);
        ?>
    </div>
    <div class=" col-lg-6">
        <h4>Riwayat Kerja</h4>
        <?php
        $this->widget('BGridView', [
            'id' => 'pegawai-mutasi-grid',
            'dataProvider' => $daftarMutasi->search(),
            'filter' => null,
            'htmlOptions' => ['style' => 'width: 100%'],
            'columns' => [
                [
                    'class' => 'BDataColumn',
                    'name' => 'keteranganPegawai',
                    'value' => '$data->getKeteranganPegawai()'
                ],
                [
                    'class' => 'BDataColumn',
                    'name' => 'per_tanggal'
                ],
                [
                    'class' => 'BDataColumn',
                    'name' => 'keterangan'
                ],
            ]
        ]);
        ?>        
    </div>
</div>
<?php
$this->menu = [
    [
        'submenuOptions' => ['class' => 'btn-group visible-sm-block visible-md-block visible-lg-block'],
        'label' => false,
        'items' => [
            [
                'label' => '<i class="fa fa-pencil"></i> <span class="ak">U</span>bah',
                'url' => $this->createUrl('ubah', ['id' => $model->id]),
                'linkOptions' => [
                    'class' => 'btn btn-sm btn-default',
                    'accesskey' => 'u'
                ]
            ],
            [
                'label' => '<i class="fa fa-times"></i> <span class="ak">H</span>apus',
                'url' => $this->createUrl('hapus', ['id' => $model->id]),
                'linkOptions' => [
                    'class' => 'btn btn-sm btn-default',
                    'accesskey' => 'h',
                    'submit' => ['hapus', 'id' => $model->id],
                    'confirm' => 'Anda yakin?'
                ]
            ],
            [
                'label' => '<i class="fa fa-asterisk"></i> <span class="ak">I</span>ndex',
                'url' => $this->createUrl('index'),
                'linkOptions' => [
                    'class' => 'btn btn-sm btn-default',
                    'accesskey' => 'i'
                ]
            ]
        ],
    ],
    [
        'submenuOptions' => ['class' => 'btn-group visible-xs-block'],
        'label' => false,
        'items' => [
            [
                'label' => '<i class="fa fa-pencil"></i>',
                'url' => $this->createUrl('ubah', ['id' => $model->id]),
                'linkOptions' => [
                    'class' => 'btn btn-sm btn-primary',
                ]
            ],
            [
                'label' => '<i class="fa fa-times"></i>',
                'url' => $this->createUrl('hapus', ['id' => $model->id]),
                'linkOptions' => [
                    'class' => 'btn btn-sm btn-primary',
                    'submit' => ['hapus', 'id' => $model->id],
                    'confirm' => 'Anda yakin?'
                ]
            ],
            [
                'label' => '<i class="fa fa-asterisk"></i>',
                'url' => $this->createUrl('index'),
                'linkOptions' => [
                    'class' => 'btn btn-sm btn-primary',
                ]
            ]
        ],
    ]
];
