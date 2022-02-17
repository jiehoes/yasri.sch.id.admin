<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *                                   ATTENTION!
 * If you see this message in your browser (Internet Explorer, Mozilla Firefox, Google Chrome, etc.)
 * this means that PHP is not properly installed on your web server. Please refer to the PHP manual
 * for more details: http://php.net/manual/install.php 
 *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */

    include_once dirname(__FILE__) . '/components/startup.php';
    include_once dirname(__FILE__) . '/components/application.php';
    include_once dirname(__FILE__) . '/' . 'authorization.php';


    include_once dirname(__FILE__) . '/' . 'database_engine/mysql_engine.php';
    include_once dirname(__FILE__) . '/' . 'components/page/page_includes.php';

    function GetConnectionOptions()
    {
        $result = GetGlobalConnectionOptions();
        $result['client_encoding'] = 'utf8';
        GetApplication()->GetUserAuthentication()->applyIdentityToConnectionOptions($result);
        return $result;
    }

    
    
    
    // OnBeforePageExecute event handler
    
    
    
    class siswa_usersPage extends Page
    {
        protected function DoBeforeCreate()
        {
            $this->SetTitle('Siswa Users');
            $this->SetMenuLabel('Siswa');
    
            $this->dataset = new TableDataset(
                MySqlIConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`siswa_users`');
            $this->dataset->addFields(
                array(
                    new IntegerField('siswa_id', true, true, true),
                    new StringField('kelas_id'),
                    new IntegerField('nis'),
                    new StringField('user_name', true),
                    new StringField('user_password', true),
                    new StringField('user_email', true),
                    new StringField('user_token'),
                    new StringField('nama'),
                    new StringField('jenis_kelamin'),
                    new StringField('nama_ayah_wali'),
                    new IntegerField('no_ktp_ayah'),
                    new StringField('nama_ibu'),
                    new StringField('alamat'),
                    new IntegerField('rt'),
                    new IntegerField('rw'),
                    new StringField('kelurahan_desa'),
                    new StringField('kecamatan'),
                    new StringField('kota_kabupaten'),
                    new IntegerField('kode_pos'),
                    new StringField('tempat_lahir'),
                    new DateField('tanggal_lahir'),
                    new StringField('golongan_darah'),
                    new IntegerField('nisn'),
                    new IntegerField('nik'),
                    new StringField('nomor_tlp_wa'),
                    new IntegerField('anak_ke'),
                    new IntegerField('jumlah_saudara'),
                    new StringField('asal_sekolah'),
                    new StringField('asal_kotakab'),
                    new IntegerField('user_status', true),
                    new DateTimeField('tanggal_update', true),
                    new BlobField('dokumen_kk', true),
                    new BlobField('dokumen_akte_kelahiran', true),
                    new BlobField('dokumen_pas_foto', true)
                )
            );
        }
    
        protected function DoPrepare() {
    
        }
    
        protected function CreatePageNavigator()
        {
            $result = new CompositePageNavigator($this);
            
            $partitionNavigator = new PageNavigator('pnav', $this, $this->dataset);
            $partitionNavigator->SetRowsPerPage(20);
            $result->AddPageNavigator($partitionNavigator);
            
            return $result;
        }
    
        protected function CreateRssGenerator()
        {
            return null;
        }
    
        protected function setupCharts()
        {
    
        }
    
        protected function getFiltersColumns()
        {
            return array(
                new FilterColumn($this->dataset, 'kelas_id', 'kelas_id', 'Kelas Id'),
                new FilterColumn($this->dataset, 'nis', 'nis', 'Nis'),
                new FilterColumn($this->dataset, 'user_name', 'user_name', 'User Name'),
                new FilterColumn($this->dataset, 'user_password', 'user_password', 'User Password'),
                new FilterColumn($this->dataset, 'user_email', 'user_email', 'User Email'),
                new FilterColumn($this->dataset, 'user_token', 'user_token', 'User Token'),
                new FilterColumn($this->dataset, 'nama', 'nama', 'Nama'),
                new FilterColumn($this->dataset, 'jenis_kelamin', 'jenis_kelamin', 'Jenis Kelamin'),
                new FilterColumn($this->dataset, 'nama_ayah_wali', 'nama_ayah_wali', 'Nama Ayah Wali'),
                new FilterColumn($this->dataset, 'no_ktp_ayah', 'no_ktp_ayah', 'No Ktp Ayah'),
                new FilterColumn($this->dataset, 'nama_ibu', 'nama_ibu', 'Nama Ibu'),
                new FilterColumn($this->dataset, 'alamat', 'alamat', 'Alamat'),
                new FilterColumn($this->dataset, 'rt', 'rt', 'Rt'),
                new FilterColumn($this->dataset, 'rw', 'rw', 'Rw'),
                new FilterColumn($this->dataset, 'kelurahan_desa', 'kelurahan_desa', 'Kelurahan Desa'),
                new FilterColumn($this->dataset, 'kecamatan', 'kecamatan', 'Kecamatan'),
                new FilterColumn($this->dataset, 'kota_kabupaten', 'kota_kabupaten', 'Kota Kabupaten'),
                new FilterColumn($this->dataset, 'kode_pos', 'kode_pos', 'Kode Pos'),
                new FilterColumn($this->dataset, 'tempat_lahir', 'tempat_lahir', 'Tempat Lahir'),
                new FilterColumn($this->dataset, 'tanggal_lahir', 'tanggal_lahir', 'Tanggal Lahir'),
                new FilterColumn($this->dataset, 'golongan_darah', 'golongan_darah', 'Golongan Darah'),
                new FilterColumn($this->dataset, 'nisn', 'nisn', 'Nisn'),
                new FilterColumn($this->dataset, 'nik', 'nik', 'Nik'),
                new FilterColumn($this->dataset, 'nomor_tlp_wa', 'nomor_tlp_wa', 'Nomor Tlp Wa'),
                new FilterColumn($this->dataset, 'anak_ke', 'anak_ke', 'Anak Ke'),
                new FilterColumn($this->dataset, 'jumlah_saudara', 'jumlah_saudara', 'Jumlah Saudara'),
                new FilterColumn($this->dataset, 'asal_sekolah', 'asal_sekolah', 'Asal Sekolah'),
                new FilterColumn($this->dataset, 'asal_kotakab', 'asal_kotakab', 'Asal Kotakab'),
                new FilterColumn($this->dataset, 'user_status', 'user_status', 'User Status'),
                new FilterColumn($this->dataset, 'tanggal_update', 'tanggal_update', 'Tanggal Update'),
                new FilterColumn($this->dataset, 'dokumen_kk', 'dokumen_kk', 'Dokumen Kk'),
                new FilterColumn($this->dataset, 'dokumen_akte_kelahiran', 'dokumen_akte_kelahiran', 'Dokumen Akte Kelahiran'),
                new FilterColumn($this->dataset, 'dokumen_pas_foto', 'dokumen_pas_foto', 'Dokumen Pas Foto'),
                new FilterColumn($this->dataset, 'siswa_id', 'siswa_id', 'Siswa Id')
            );
        }
    
        protected function setupQuickFilter(QuickFilter $quickFilter, FixedKeysArray $columns)
        {
            $quickFilter
                ->addColumn($columns['kelas_id'])
                ->addColumn($columns['nis'])
                ->addColumn($columns['user_name'])
                ->addColumn($columns['user_email'])
                ->addColumn($columns['nama'])
                ->addColumn($columns['jenis_kelamin'])
                ->addColumn($columns['nama_ayah_wali'])
                ->addColumn($columns['no_ktp_ayah'])
                ->addColumn($columns['nama_ibu'])
                ->addColumn($columns['alamat'])
                ->addColumn($columns['rt'])
                ->addColumn($columns['rw'])
                ->addColumn($columns['kelurahan_desa'])
                ->addColumn($columns['kecamatan'])
                ->addColumn($columns['kota_kabupaten'])
                ->addColumn($columns['kode_pos'])
                ->addColumn($columns['tempat_lahir'])
                ->addColumn($columns['tanggal_lahir'])
                ->addColumn($columns['golongan_darah'])
                ->addColumn($columns['nisn'])
                ->addColumn($columns['nik'])
                ->addColumn($columns['nomor_tlp_wa'])
                ->addColumn($columns['anak_ke'])
                ->addColumn($columns['jumlah_saudara'])
                ->addColumn($columns['asal_sekolah'])
                ->addColumn($columns['asal_kotakab'])
                ->addColumn($columns['user_status'])
                ->addColumn($columns['tanggal_update'])
                ->addColumn($columns['dokumen_kk'])
                ->addColumn($columns['dokumen_akte_kelahiran'])
                ->addColumn($columns['dokumen_pas_foto'])
                ->addColumn($columns['siswa_id']);
        }
    
        protected function setupColumnFilter(ColumnFilter $columnFilter)
        {
            $columnFilter
                ->setOptionsFor('kelas_id')
                ->setOptionsFor('jenis_kelamin')
                ->setOptionsFor('tanggal_lahir')
                ->setOptionsFor('tanggal_update')
                ->setOptionsFor('dokumen_kk')
                ->setOptionsFor('dokumen_akte_kelahiran')
                ->setOptionsFor('dokumen_pas_foto');
        }
    
        protected function setupFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
            $main_editor = new ComboBox('kelas_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $main_editor->addChoice('X-DKV', 'X-DKV');
            $main_editor->addChoice('XI-DKV', 'XI-DKV');
            $main_editor->addChoice('XII-DKV', 'XII-DKV');
            $main_editor->addChoice('X-OTKP', 'X-OTKP');
            $main_editor->addChoice('XI-OTKP', 'XI-OTKP');
            $main_editor->addChoice('XII-OTKP', 'XII-OTKP');
            $main_editor->SetAllowNullValue(false);
            
            $multi_value_select_editor = new MultiValueSelect('kelas_id');
            $multi_value_select_editor->setChoices($main_editor->getChoices());
            
            $text_editor = new TextEdit('kelas_id');
            
            $filterBuilder->addColumn(
                $columns['kelas_id'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $text_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $text_editor,
                    FilterConditionOperator::BEGINS_WITH => $text_editor,
                    FilterConditionOperator::ENDS_WITH => $text_editor,
                    FilterConditionOperator::IS_LIKE => $text_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $text_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('nis_edit');
            
            $filterBuilder->addColumn(
                $columns['nis'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('user_name');
            
            $filterBuilder->addColumn(
                $columns['user_name'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('user_email');
            
            $filterBuilder->addColumn(
                $columns['user_email'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('nama');
            
            $filterBuilder->addColumn(
                $columns['nama'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new ComboBox('jenis_kelamin_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $main_editor->addChoice('Laki-laki', 'Laki-laki');
            $main_editor->addChoice('Perempuan', 'Perempuan');
            $main_editor->SetAllowNullValue(false);
            
            $multi_value_select_editor = new MultiValueSelect('jenis_kelamin');
            $multi_value_select_editor->setChoices($main_editor->getChoices());
            
            $text_editor = new TextEdit('jenis_kelamin');
            
            $filterBuilder->addColumn(
                $columns['jenis_kelamin'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $text_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $text_editor,
                    FilterConditionOperator::BEGINS_WITH => $text_editor,
                    FilterConditionOperator::ENDS_WITH => $text_editor,
                    FilterConditionOperator::IS_LIKE => $text_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $text_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('nama_ayah_wali');
            
            $filterBuilder->addColumn(
                $columns['nama_ayah_wali'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('no_ktp_ayah_edit');
            
            $filterBuilder->addColumn(
                $columns['no_ktp_ayah'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('nama_ibu');
            
            $filterBuilder->addColumn(
                $columns['nama_ibu'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('alamat');
            
            $filterBuilder->addColumn(
                $columns['alamat'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('rt_edit');
            
            $filterBuilder->addColumn(
                $columns['rt'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('rw_edit');
            
            $filterBuilder->addColumn(
                $columns['rw'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('kelurahan_desa');
            
            $filterBuilder->addColumn(
                $columns['kelurahan_desa'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('kecamatan');
            
            $filterBuilder->addColumn(
                $columns['kecamatan'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('kota_kabupaten');
            
            $filterBuilder->addColumn(
                $columns['kota_kabupaten'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('kode_pos_edit');
            
            $filterBuilder->addColumn(
                $columns['kode_pos'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('tempat_lahir');
            
            $filterBuilder->addColumn(
                $columns['tempat_lahir'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new DateTimeEdit('tanggal_lahir_edit', false, 'Y-m-d');
            
            $filterBuilder->addColumn(
                $columns['tanggal_lahir'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::DATE_EQUALS => $main_editor,
                    FilterConditionOperator::DATE_DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::TODAY => null,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('golongan_darah');
            
            $filterBuilder->addColumn(
                $columns['golongan_darah'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('nisn_edit');
            
            $filterBuilder->addColumn(
                $columns['nisn'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('nik_edit');
            
            $filterBuilder->addColumn(
                $columns['nik'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('nomor_tlp_wa_edit');
            $main_editor->SetMaxLength(50);
            
            $filterBuilder->addColumn(
                $columns['nomor_tlp_wa'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('anak_ke_edit');
            
            $filterBuilder->addColumn(
                $columns['anak_ke'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('jumlah_saudara_edit');
            
            $filterBuilder->addColumn(
                $columns['jumlah_saudara'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('asal_sekolah');
            
            $filterBuilder->addColumn(
                $columns['asal_sekolah'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('asal_kotakab');
            
            $filterBuilder->addColumn(
                $columns['asal_kotakab'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('user_status_edit');
            
            $filterBuilder->addColumn(
                $columns['user_status'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new DateTimeEdit('tanggal_update_edit', false, 'Y-m-d H:i:s');
            
            $filterBuilder->addColumn(
                $columns['tanggal_update'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::DATE_EQUALS => $main_editor,
                    FilterConditionOperator::DATE_DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::TODAY => null,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('dokumen_kk');
            
            $filterBuilder->addColumn(
                $columns['dokumen_kk'],
                array(
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('dokumen_akte_kelahiran');
            
            $filterBuilder->addColumn(
                $columns['dokumen_akte_kelahiran'],
                array(
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('dokumen_pas_foto');
            
            $filterBuilder->addColumn(
                $columns['dokumen_pas_foto'],
                array(
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('siswa_id_edit');
            
            $filterBuilder->addColumn(
                $columns['siswa_id'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
        }
    
        protected function AddOperationsColumns(Grid $grid)
        {
            $actions = $grid->getActions();
            $actions->setCaption($this->GetLocalizerCaptions()->GetMessageString('Actions'));
            $actions->setPosition(ActionList::POSITION_RIGHT);
            
            if ($this->GetSecurityInfo()->HasEditGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('Edit'), OPERATION_EDIT, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
                $operation->OnShow->AddListener('ShowEditButtonHandler', $this);
            }
            
            if ($this->GetSecurityInfo()->HasDeleteGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('Delete'), OPERATION_DELETE, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
                $operation->OnShow->AddListener('ShowDeleteButtonHandler', $this);
                $operation->SetAdditionalAttribute('data-modal-operation', 'delete');
                $operation->SetAdditionalAttribute('data-delete-handler-name', $this->GetModalGridDeleteHandler());
            }
        }
    
        protected function AddFieldColumns(Grid $grid, $withDetails = true)
        {
            //
            // View column for kelas_id field
            //
            $column = new TextViewColumn('kelas_id', 'kelas_id', 'Kelas Id', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for nis field
            //
            $column = new NumberViewColumn('nis', 'nis', 'Nis', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for user_name field
            //
            $column = new TextViewColumn('user_name', 'user_name', 'User Name', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for user_email field
            //
            $column = new TextViewColumn('user_email', 'user_email', 'User Email', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for nama field
            //
            $column = new TextViewColumn('nama', 'nama', 'Nama', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for jenis_kelamin field
            //
            $column = new TextViewColumn('jenis_kelamin', 'jenis_kelamin', 'Jenis Kelamin', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for nama_ayah_wali field
            //
            $column = new TextViewColumn('nama_ayah_wali', 'nama_ayah_wali', 'Nama Ayah Wali', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for no_ktp_ayah field
            //
            $column = new NumberViewColumn('no_ktp_ayah', 'no_ktp_ayah', 'No Ktp Ayah', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for nama_ibu field
            //
            $column = new TextViewColumn('nama_ibu', 'nama_ibu', 'Nama Ibu', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for alamat field
            //
            $column = new TextViewColumn('alamat', 'alamat', 'Alamat', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for rt field
            //
            $column = new NumberViewColumn('rt', 'rt', 'Rt', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for rw field
            //
            $column = new NumberViewColumn('rw', 'rw', 'Rw', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for kelurahan_desa field
            //
            $column = new TextViewColumn('kelurahan_desa', 'kelurahan_desa', 'Kelurahan Desa', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for kecamatan field
            //
            $column = new TextViewColumn('kecamatan', 'kecamatan', 'Kecamatan', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for kota_kabupaten field
            //
            $column = new TextViewColumn('kota_kabupaten', 'kota_kabupaten', 'Kota Kabupaten', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for kode_pos field
            //
            $column = new NumberViewColumn('kode_pos', 'kode_pos', 'Kode Pos', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for tempat_lahir field
            //
            $column = new TextViewColumn('tempat_lahir', 'tempat_lahir', 'Tempat Lahir', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for tanggal_lahir field
            //
            $column = new DateTimeViewColumn('tanggal_lahir', 'tanggal_lahir', 'Tanggal Lahir', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('Y-m-d');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for golongan_darah field
            //
            $column = new TextViewColumn('golongan_darah', 'golongan_darah', 'Golongan Darah', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for nisn field
            //
            $column = new NumberViewColumn('nisn', 'nisn', 'Nisn', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for nik field
            //
            $column = new NumberViewColumn('nik', 'nik', 'Nik', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for nomor_tlp_wa field
            //
            $column = new TextViewColumn('nomor_tlp_wa', 'nomor_tlp_wa', 'Nomor Tlp Wa', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for anak_ke field
            //
            $column = new NumberViewColumn('anak_ke', 'anak_ke', 'Anak Ke', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for jumlah_saudara field
            //
            $column = new NumberViewColumn('jumlah_saudara', 'jumlah_saudara', 'Jumlah Saudara', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for asal_sekolah field
            //
            $column = new TextViewColumn('asal_sekolah', 'asal_sekolah', 'Asal Sekolah', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for asal_kotakab field
            //
            $column = new TextViewColumn('asal_kotakab', 'asal_kotakab', 'Asal Kotakab', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for user_status field
            //
            $column = new NumberViewColumn('user_status', 'user_status', 'User Status', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('0 = OK, 1 = Account verification required, 2 = Password reset requested.');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for tanggal_update field
            //
            $column = new DateTimeViewColumn('tanggal_update', 'tanggal_update', 'Tanggal Update', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for dokumen_kk field
            //
            $column = new DownloadDataColumn('dokumen_kk', 'dokumen_kk', 'Dokumen Kk', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for dokumen_akte_kelahiran field
            //
            $column = new DownloadDataColumn('dokumen_akte_kelahiran', 'dokumen_akte_kelahiran', 'Dokumen Akte Kelahiran', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for dokumen_pas_foto field
            //
            $column = new DownloadDataColumn('dokumen_pas_foto', 'dokumen_pas_foto', 'Dokumen Pas Foto', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for siswa_id field
            //
            $column = new NumberViewColumn('siswa_id', 'siswa_id', 'Siswa Id', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for kelas_id field
            //
            $column = new TextViewColumn('kelas_id', 'kelas_id', 'Kelas Id', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for nis field
            //
            $column = new NumberViewColumn('nis', 'nis', 'Nis', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for user_name field
            //
            $column = new TextViewColumn('user_name', 'user_name', 'User Name', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for user_email field
            //
            $column = new TextViewColumn('user_email', 'user_email', 'User Email', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for nama field
            //
            $column = new TextViewColumn('nama', 'nama', 'Nama', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for jenis_kelamin field
            //
            $column = new TextViewColumn('jenis_kelamin', 'jenis_kelamin', 'Jenis Kelamin', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for nama_ayah_wali field
            //
            $column = new TextViewColumn('nama_ayah_wali', 'nama_ayah_wali', 'Nama Ayah Wali', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for no_ktp_ayah field
            //
            $column = new NumberViewColumn('no_ktp_ayah', 'no_ktp_ayah', 'No Ktp Ayah', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for nama_ibu field
            //
            $column = new TextViewColumn('nama_ibu', 'nama_ibu', 'Nama Ibu', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for alamat field
            //
            $column = new TextViewColumn('alamat', 'alamat', 'Alamat', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for rt field
            //
            $column = new NumberViewColumn('rt', 'rt', 'Rt', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for rw field
            //
            $column = new NumberViewColumn('rw', 'rw', 'Rw', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for kelurahan_desa field
            //
            $column = new TextViewColumn('kelurahan_desa', 'kelurahan_desa', 'Kelurahan Desa', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for kecamatan field
            //
            $column = new TextViewColumn('kecamatan', 'kecamatan', 'Kecamatan', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for kota_kabupaten field
            //
            $column = new TextViewColumn('kota_kabupaten', 'kota_kabupaten', 'Kota Kabupaten', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for kode_pos field
            //
            $column = new NumberViewColumn('kode_pos', 'kode_pos', 'Kode Pos', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for tempat_lahir field
            //
            $column = new TextViewColumn('tempat_lahir', 'tempat_lahir', 'Tempat Lahir', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for tanggal_lahir field
            //
            $column = new DateTimeViewColumn('tanggal_lahir', 'tanggal_lahir', 'Tanggal Lahir', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('Y-m-d');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for golongan_darah field
            //
            $column = new TextViewColumn('golongan_darah', 'golongan_darah', 'Golongan Darah', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for nisn field
            //
            $column = new NumberViewColumn('nisn', 'nisn', 'Nisn', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for nik field
            //
            $column = new NumberViewColumn('nik', 'nik', 'Nik', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for nomor_tlp_wa field
            //
            $column = new TextViewColumn('nomor_tlp_wa', 'nomor_tlp_wa', 'Nomor Tlp Wa', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for anak_ke field
            //
            $column = new NumberViewColumn('anak_ke', 'anak_ke', 'Anak Ke', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for jumlah_saudara field
            //
            $column = new NumberViewColumn('jumlah_saudara', 'jumlah_saudara', 'Jumlah Saudara', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for asal_sekolah field
            //
            $column = new TextViewColumn('asal_sekolah', 'asal_sekolah', 'Asal Sekolah', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for asal_kotakab field
            //
            $column = new TextViewColumn('asal_kotakab', 'asal_kotakab', 'Asal Kotakab', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for user_status field
            //
            $column = new NumberViewColumn('user_status', 'user_status', 'User Status', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for tanggal_update field
            //
            $column = new DateTimeViewColumn('tanggal_update', 'tanggal_update', 'Tanggal Update', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for dokumen_kk field
            //
            $column = new DownloadDataColumn('dokumen_kk', 'dokumen_kk', 'Dokumen Kk', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for dokumen_akte_kelahiran field
            //
            $column = new DownloadDataColumn('dokumen_akte_kelahiran', 'dokumen_akte_kelahiran', 'Dokumen Akte Kelahiran', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for dokumen_pas_foto field
            //
            $column = new DownloadDataColumn('dokumen_pas_foto', 'dokumen_pas_foto', 'Dokumen Pas Foto', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for siswa_id field
            //
            $column = new NumberViewColumn('siswa_id', 'siswa_id', 'Siswa Id', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for kelas_id field
            //
            $editor = new ComboBox('kelas_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('X-DKV', 'X-DKV');
            $editor->addChoice('XI-DKV', 'XI-DKV');
            $editor->addChoice('XII-DKV', 'XII-DKV');
            $editor->addChoice('X-OTKP', 'X-OTKP');
            $editor->addChoice('XI-OTKP', 'XI-OTKP');
            $editor->addChoice('XII-OTKP', 'XII-OTKP');
            $editColumn = new CustomEditColumn('Kelas Id', 'kelas_id', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for nis field
            //
            $editor = new TextEdit('nis_edit');
            $editColumn = new CustomEditColumn('Nis', 'nis', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for user_name field
            //
            $editor = new TextAreaEdit('user_name_edit', 50, 8);
            $editColumn = new CustomEditColumn('User Name', 'user_name', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for user_email field
            //
            $editor = new TextAreaEdit('user_email_edit', 50, 8);
            $editColumn = new CustomEditColumn('User Email', 'user_email', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for nama field
            //
            $editor = new TextAreaEdit('nama_edit', 50, 8);
            $editColumn = new CustomEditColumn('Nama', 'nama', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for jenis_kelamin field
            //
            $editor = new ComboBox('jenis_kelamin_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('Laki-laki', 'Laki-laki');
            $editor->addChoice('Perempuan', 'Perempuan');
            $editColumn = new CustomEditColumn('Jenis Kelamin', 'jenis_kelamin', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for nama_ayah_wali field
            //
            $editor = new TextAreaEdit('nama_ayah_wali_edit', 50, 8);
            $editColumn = new CustomEditColumn('Nama Ayah Wali', 'nama_ayah_wali', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for no_ktp_ayah field
            //
            $editor = new TextEdit('no_ktp_ayah_edit');
            $editColumn = new CustomEditColumn('No Ktp Ayah', 'no_ktp_ayah', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for nama_ibu field
            //
            $editor = new TextAreaEdit('nama_ibu_edit', 50, 8);
            $editColumn = new CustomEditColumn('Nama Ibu', 'nama_ibu', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for alamat field
            //
            $editor = new TextAreaEdit('alamat_edit', 50, 8);
            $editColumn = new CustomEditColumn('Alamat', 'alamat', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for rt field
            //
            $editor = new TextEdit('rt_edit');
            $editColumn = new CustomEditColumn('Rt', 'rt', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for rw field
            //
            $editor = new TextEdit('rw_edit');
            $editColumn = new CustomEditColumn('Rw', 'rw', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for kelurahan_desa field
            //
            $editor = new TextAreaEdit('kelurahan_desa_edit', 50, 8);
            $editColumn = new CustomEditColumn('Kelurahan Desa', 'kelurahan_desa', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for kecamatan field
            //
            $editor = new TextAreaEdit('kecamatan_edit', 50, 8);
            $editColumn = new CustomEditColumn('Kecamatan', 'kecamatan', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for kota_kabupaten field
            //
            $editor = new TextAreaEdit('kota_kabupaten_edit', 50, 8);
            $editColumn = new CustomEditColumn('Kota Kabupaten', 'kota_kabupaten', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for kode_pos field
            //
            $editor = new TextEdit('kode_pos_edit');
            $editColumn = new CustomEditColumn('Kode Pos', 'kode_pos', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for tempat_lahir field
            //
            $editor = new TextAreaEdit('tempat_lahir_edit', 50, 8);
            $editColumn = new CustomEditColumn('Tempat Lahir', 'tempat_lahir', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for tanggal_lahir field
            //
            $editor = new DateTimeEdit('tanggal_lahir_edit', false, 'Y-m-d');
            $editColumn = new CustomEditColumn('Tanggal Lahir', 'tanggal_lahir', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for golongan_darah field
            //
            $editor = new TextAreaEdit('golongan_darah_edit', 50, 8);
            $editColumn = new CustomEditColumn('Golongan Darah', 'golongan_darah', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for nisn field
            //
            $editor = new TextEdit('nisn_edit');
            $editColumn = new CustomEditColumn('Nisn', 'nisn', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for nik field
            //
            $editor = new TextEdit('nik_edit');
            $editColumn = new CustomEditColumn('Nik', 'nik', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for nomor_tlp_wa field
            //
            $editor = new TextEdit('nomor_tlp_wa_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Nomor Tlp Wa', 'nomor_tlp_wa', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for anak_ke field
            //
            $editor = new TextEdit('anak_ke_edit');
            $editColumn = new CustomEditColumn('Anak Ke', 'anak_ke', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for jumlah_saudara field
            //
            $editor = new TextEdit('jumlah_saudara_edit');
            $editColumn = new CustomEditColumn('Jumlah Saudara', 'jumlah_saudara', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for asal_sekolah field
            //
            $editor = new TextAreaEdit('asal_sekolah_edit', 50, 8);
            $editColumn = new CustomEditColumn('Asal Sekolah', 'asal_sekolah', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for asal_kotakab field
            //
            $editor = new TextAreaEdit('asal_kotakab_edit', 50, 8);
            $editColumn = new CustomEditColumn('Asal Kotakab', 'asal_kotakab', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for user_status field
            //
            $editor = new TextEdit('user_status_edit');
            $editColumn = new CustomEditColumn('User Status', 'user_status', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for tanggal_update field
            //
            $editor = new DateTimeEdit('tanggal_update_edit', false, 'Y-m-d H:i:s');
            $editColumn = new CustomEditColumn('Tanggal Update', 'tanggal_update', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for dokumen_kk field
            //
            $editor = new ImageUploader('dokumen_kk_edit');
            $editor->SetShowImage(false);
            $editColumn = new FileUploadingColumn('Dokumen Kk', 'dokumen_kk', $editor, $this->dataset, false, false, 'siswa_users_dokumen_kk_handler_edit');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for dokumen_akte_kelahiran field
            //
            $editor = new ImageUploader('dokumen_akte_kelahiran_edit');
            $editor->SetShowImage(false);
            $editColumn = new FileUploadingColumn('Dokumen Akte Kelahiran', 'dokumen_akte_kelahiran', $editor, $this->dataset, false, false, 'siswa_users_dokumen_akte_kelahiran_handler_edit');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for dokumen_pas_foto field
            //
            $editor = new ImageUploader('dokumen_pas_foto_edit');
            $editor->SetShowImage(false);
            $editColumn = new FileUploadingColumn('Dokumen Pas Foto', 'dokumen_pas_foto', $editor, $this->dataset, false, false, 'siswa_users_dokumen_pas_foto_handler_edit');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for siswa_id field
            //
            $editor = new TextEdit('siswa_id_edit');
            $editColumn = new CustomEditColumn('Siswa Id', 'siswa_id', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }
    
        protected function AddMultiEditColumns(Grid $grid)
        {
            //
            // Edit column for kelas_id field
            //
            $editor = new ComboBox('kelas_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('X-DKV', 'X-DKV');
            $editor->addChoice('XI-DKV', 'XI-DKV');
            $editor->addChoice('XII-DKV', 'XII-DKV');
            $editor->addChoice('X-OTKP', 'X-OTKP');
            $editor->addChoice('XI-OTKP', 'XI-OTKP');
            $editor->addChoice('XII-OTKP', 'XII-OTKP');
            $editColumn = new CustomEditColumn('Kelas Id', 'kelas_id', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for nis field
            //
            $editor = new TextEdit('nis_edit');
            $editColumn = new CustomEditColumn('Nis', 'nis', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for user_name field
            //
            $editor = new TextAreaEdit('user_name_edit', 50, 8);
            $editColumn = new CustomEditColumn('User Name', 'user_name', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for user_email field
            //
            $editor = new TextAreaEdit('user_email_edit', 50, 8);
            $editColumn = new CustomEditColumn('User Email', 'user_email', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for nama field
            //
            $editor = new TextAreaEdit('nama_edit', 50, 8);
            $editColumn = new CustomEditColumn('Nama', 'nama', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for jenis_kelamin field
            //
            $editor = new ComboBox('jenis_kelamin_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('Laki-laki', 'Laki-laki');
            $editor->addChoice('Perempuan', 'Perempuan');
            $editColumn = new CustomEditColumn('Jenis Kelamin', 'jenis_kelamin', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for nama_ayah_wali field
            //
            $editor = new TextAreaEdit('nama_ayah_wali_edit', 50, 8);
            $editColumn = new CustomEditColumn('Nama Ayah Wali', 'nama_ayah_wali', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for no_ktp_ayah field
            //
            $editor = new TextEdit('no_ktp_ayah_edit');
            $editColumn = new CustomEditColumn('No Ktp Ayah', 'no_ktp_ayah', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for nama_ibu field
            //
            $editor = new TextAreaEdit('nama_ibu_edit', 50, 8);
            $editColumn = new CustomEditColumn('Nama Ibu', 'nama_ibu', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for alamat field
            //
            $editor = new TextAreaEdit('alamat_edit', 50, 8);
            $editColumn = new CustomEditColumn('Alamat', 'alamat', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for rt field
            //
            $editor = new TextEdit('rt_edit');
            $editColumn = new CustomEditColumn('Rt', 'rt', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for rw field
            //
            $editor = new TextEdit('rw_edit');
            $editColumn = new CustomEditColumn('Rw', 'rw', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for kelurahan_desa field
            //
            $editor = new TextAreaEdit('kelurahan_desa_edit', 50, 8);
            $editColumn = new CustomEditColumn('Kelurahan Desa', 'kelurahan_desa', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for kecamatan field
            //
            $editor = new TextAreaEdit('kecamatan_edit', 50, 8);
            $editColumn = new CustomEditColumn('Kecamatan', 'kecamatan', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for kota_kabupaten field
            //
            $editor = new TextAreaEdit('kota_kabupaten_edit', 50, 8);
            $editColumn = new CustomEditColumn('Kota Kabupaten', 'kota_kabupaten', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for kode_pos field
            //
            $editor = new TextEdit('kode_pos_edit');
            $editColumn = new CustomEditColumn('Kode Pos', 'kode_pos', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for tempat_lahir field
            //
            $editor = new TextAreaEdit('tempat_lahir_edit', 50, 8);
            $editColumn = new CustomEditColumn('Tempat Lahir', 'tempat_lahir', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for tanggal_lahir field
            //
            $editor = new DateTimeEdit('tanggal_lahir_edit', false, 'Y-m-d');
            $editColumn = new CustomEditColumn('Tanggal Lahir', 'tanggal_lahir', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for golongan_darah field
            //
            $editor = new TextAreaEdit('golongan_darah_edit', 50, 8);
            $editColumn = new CustomEditColumn('Golongan Darah', 'golongan_darah', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for nisn field
            //
            $editor = new TextEdit('nisn_edit');
            $editColumn = new CustomEditColumn('Nisn', 'nisn', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for nik field
            //
            $editor = new TextEdit('nik_edit');
            $editColumn = new CustomEditColumn('Nik', 'nik', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for nomor_tlp_wa field
            //
            $editor = new TextEdit('nomor_tlp_wa_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Nomor Tlp Wa', 'nomor_tlp_wa', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for anak_ke field
            //
            $editor = new TextEdit('anak_ke_edit');
            $editColumn = new CustomEditColumn('Anak Ke', 'anak_ke', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for jumlah_saudara field
            //
            $editor = new TextEdit('jumlah_saudara_edit');
            $editColumn = new CustomEditColumn('Jumlah Saudara', 'jumlah_saudara', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for asal_sekolah field
            //
            $editor = new TextAreaEdit('asal_sekolah_edit', 50, 8);
            $editColumn = new CustomEditColumn('Asal Sekolah', 'asal_sekolah', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for asal_kotakab field
            //
            $editor = new TextAreaEdit('asal_kotakab_edit', 50, 8);
            $editColumn = new CustomEditColumn('Asal Kotakab', 'asal_kotakab', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for user_status field
            //
            $editor = new TextEdit('user_status_edit');
            $editColumn = new CustomEditColumn('User Status', 'user_status', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for tanggal_update field
            //
            $editor = new DateTimeEdit('tanggal_update_edit', false, 'Y-m-d H:i:s');
            $editColumn = new CustomEditColumn('Tanggal Update', 'tanggal_update', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for dokumen_kk field
            //
            $editor = new ImageUploader('dokumen_kk_edit');
            $editor->SetShowImage(false);
            $editColumn = new FileUploadingColumn('Dokumen Kk', 'dokumen_kk', $editor, $this->dataset, false, false, 'siswa_users_dokumen_kk_handler_multi_edit');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for dokumen_akte_kelahiran field
            //
            $editor = new ImageUploader('dokumen_akte_kelahiran_edit');
            $editor->SetShowImage(false);
            $editColumn = new FileUploadingColumn('Dokumen Akte Kelahiran', 'dokumen_akte_kelahiran', $editor, $this->dataset, false, false, 'siswa_users_dokumen_akte_kelahiran_handler_multi_edit');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for dokumen_pas_foto field
            //
            $editor = new ImageUploader('dokumen_pas_foto_edit');
            $editor->SetShowImage(false);
            $editColumn = new FileUploadingColumn('Dokumen Pas Foto', 'dokumen_pas_foto', $editor, $this->dataset, false, false, 'siswa_users_dokumen_pas_foto_handler_multi_edit');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for siswa_id field
            //
            $editor = new TextEdit('siswa_id_edit');
            $editColumn = new CustomEditColumn('Siswa Id', 'siswa_id', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for kelas_id field
            //
            $editor = new ComboBox('kelas_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('X-DKV', 'X-DKV');
            $editor->addChoice('XI-DKV', 'XI-DKV');
            $editor->addChoice('XII-DKV', 'XII-DKV');
            $editor->addChoice('X-OTKP', 'X-OTKP');
            $editor->addChoice('XI-OTKP', 'XI-OTKP');
            $editor->addChoice('XII-OTKP', 'XII-OTKP');
            $editColumn = new CustomEditColumn('Kelas Id', 'kelas_id', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for nis field
            //
            $editor = new TextEdit('nis_edit');
            $editColumn = new CustomEditColumn('Nis', 'nis', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for user_name field
            //
            $editor = new TextAreaEdit('user_name_edit', 50, 8);
            $editColumn = new CustomEditColumn('User Name', 'user_name', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for user_email field
            //
            $editor = new TextAreaEdit('user_email_edit', 50, 8);
            $editColumn = new CustomEditColumn('User Email', 'user_email', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for nama field
            //
            $editor = new TextAreaEdit('nama_edit', 50, 8);
            $editColumn = new CustomEditColumn('Nama', 'nama', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for jenis_kelamin field
            //
            $editor = new ComboBox('jenis_kelamin_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice('Laki-laki', 'Laki-laki');
            $editor->addChoice('Perempuan', 'Perempuan');
            $editColumn = new CustomEditColumn('Jenis Kelamin', 'jenis_kelamin', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for nama_ayah_wali field
            //
            $editor = new TextAreaEdit('nama_ayah_wali_edit', 50, 8);
            $editColumn = new CustomEditColumn('Nama Ayah Wali', 'nama_ayah_wali', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for no_ktp_ayah field
            //
            $editor = new TextEdit('no_ktp_ayah_edit');
            $editColumn = new CustomEditColumn('No Ktp Ayah', 'no_ktp_ayah', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for nama_ibu field
            //
            $editor = new TextAreaEdit('nama_ibu_edit', 50, 8);
            $editColumn = new CustomEditColumn('Nama Ibu', 'nama_ibu', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for alamat field
            //
            $editor = new TextAreaEdit('alamat_edit', 50, 8);
            $editColumn = new CustomEditColumn('Alamat', 'alamat', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for rt field
            //
            $editor = new TextEdit('rt_edit');
            $editColumn = new CustomEditColumn('Rt', 'rt', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for rw field
            //
            $editor = new TextEdit('rw_edit');
            $editColumn = new CustomEditColumn('Rw', 'rw', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for kelurahan_desa field
            //
            $editor = new TextAreaEdit('kelurahan_desa_edit', 50, 8);
            $editColumn = new CustomEditColumn('Kelurahan Desa', 'kelurahan_desa', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for kecamatan field
            //
            $editor = new TextAreaEdit('kecamatan_edit', 50, 8);
            $editColumn = new CustomEditColumn('Kecamatan', 'kecamatan', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for kota_kabupaten field
            //
            $editor = new TextAreaEdit('kota_kabupaten_edit', 50, 8);
            $editColumn = new CustomEditColumn('Kota Kabupaten', 'kota_kabupaten', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for kode_pos field
            //
            $editor = new TextEdit('kode_pos_edit');
            $editColumn = new CustomEditColumn('Kode Pos', 'kode_pos', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for tempat_lahir field
            //
            $editor = new TextAreaEdit('tempat_lahir_edit', 50, 8);
            $editColumn = new CustomEditColumn('Tempat Lahir', 'tempat_lahir', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for tanggal_lahir field
            //
            $editor = new DateTimeEdit('tanggal_lahir_edit', false, 'Y-m-d');
            $editColumn = new CustomEditColumn('Tanggal Lahir', 'tanggal_lahir', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for golongan_darah field
            //
            $editor = new TextAreaEdit('golongan_darah_edit', 50, 8);
            $editColumn = new CustomEditColumn('Golongan Darah', 'golongan_darah', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for nisn field
            //
            $editor = new TextEdit('nisn_edit');
            $editColumn = new CustomEditColumn('Nisn', 'nisn', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for nik field
            //
            $editor = new TextEdit('nik_edit');
            $editColumn = new CustomEditColumn('Nik', 'nik', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for nomor_tlp_wa field
            //
            $editor = new TextEdit('nomor_tlp_wa_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Nomor Tlp Wa', 'nomor_tlp_wa', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for anak_ke field
            //
            $editor = new TextEdit('anak_ke_edit');
            $editColumn = new CustomEditColumn('Anak Ke', 'anak_ke', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for jumlah_saudara field
            //
            $editor = new TextEdit('jumlah_saudara_edit');
            $editColumn = new CustomEditColumn('Jumlah Saudara', 'jumlah_saudara', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for asal_sekolah field
            //
            $editor = new TextAreaEdit('asal_sekolah_edit', 50, 8);
            $editColumn = new CustomEditColumn('Asal Sekolah', 'asal_sekolah', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for asal_kotakab field
            //
            $editor = new TextAreaEdit('asal_kotakab_edit', 50, 8);
            $editColumn = new CustomEditColumn('Asal Kotakab', 'asal_kotakab', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for user_status field
            //
            $editor = new TextEdit('user_status_edit');
            $editColumn = new CustomEditColumn('User Status', 'user_status', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for tanggal_update field
            //
            $editor = new DateTimeEdit('tanggal_update_edit', false, 'Y-m-d H:i:s');
            $editColumn = new CustomEditColumn('Tanggal Update', 'tanggal_update', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for dokumen_kk field
            //
            $editor = new ImageUploader('dokumen_kk_edit');
            $editor->SetShowImage(false);
            $editColumn = new FileUploadingColumn('Dokumen Kk', 'dokumen_kk', $editor, $this->dataset, false, false, 'siswa_users_dokumen_kk_handler_insert');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for dokumen_akte_kelahiran field
            //
            $editor = new ImageUploader('dokumen_akte_kelahiran_edit');
            $editor->SetShowImage(false);
            $editColumn = new FileUploadingColumn('Dokumen Akte Kelahiran', 'dokumen_akte_kelahiran', $editor, $this->dataset, false, false, 'siswa_users_dokumen_akte_kelahiran_handler_insert');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for dokumen_pas_foto field
            //
            $editor = new ImageUploader('dokumen_pas_foto_edit');
            $editor->SetShowImage(false);
            $editColumn = new FileUploadingColumn('Dokumen Pas Foto', 'dokumen_pas_foto', $editor, $this->dataset, false, false, 'siswa_users_dokumen_pas_foto_handler_insert');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for siswa_id field
            //
            $editor = new TextEdit('siswa_id_edit');
            $editColumn = new CustomEditColumn('Siswa Id', 'siswa_id', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            $grid->SetShowAddButton(true && $this->GetSecurityInfo()->HasAddGrant());
        }
    
        private function AddMultiUploadColumn(Grid $grid)
        {
    
        }
    
        protected function AddPrintColumns(Grid $grid)
        {
            //
            // View column for kelas_id field
            //
            $column = new TextViewColumn('kelas_id', 'kelas_id', 'Kelas Id', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for nis field
            //
            $column = new NumberViewColumn('nis', 'nis', 'Nis', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for user_name field
            //
            $column = new TextViewColumn('user_name', 'user_name', 'User Name', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddPrintColumn($column);
            
            //
            // View column for user_email field
            //
            $column = new TextViewColumn('user_email', 'user_email', 'User Email', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddPrintColumn($column);
            
            //
            // View column for nama field
            //
            $column = new TextViewColumn('nama', 'nama', 'Nama', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddPrintColumn($column);
            
            //
            // View column for jenis_kelamin field
            //
            $column = new TextViewColumn('jenis_kelamin', 'jenis_kelamin', 'Jenis Kelamin', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for nama_ayah_wali field
            //
            $column = new TextViewColumn('nama_ayah_wali', 'nama_ayah_wali', 'Nama Ayah Wali', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddPrintColumn($column);
            
            //
            // View column for no_ktp_ayah field
            //
            $column = new NumberViewColumn('no_ktp_ayah', 'no_ktp_ayah', 'No Ktp Ayah', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for nama_ibu field
            //
            $column = new TextViewColumn('nama_ibu', 'nama_ibu', 'Nama Ibu', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddPrintColumn($column);
            
            //
            // View column for alamat field
            //
            $column = new TextViewColumn('alamat', 'alamat', 'Alamat', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddPrintColumn($column);
            
            //
            // View column for rt field
            //
            $column = new NumberViewColumn('rt', 'rt', 'Rt', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for rw field
            //
            $column = new NumberViewColumn('rw', 'rw', 'Rw', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for kelurahan_desa field
            //
            $column = new TextViewColumn('kelurahan_desa', 'kelurahan_desa', 'Kelurahan Desa', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddPrintColumn($column);
            
            //
            // View column for kecamatan field
            //
            $column = new TextViewColumn('kecamatan', 'kecamatan', 'Kecamatan', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddPrintColumn($column);
            
            //
            // View column for kota_kabupaten field
            //
            $column = new TextViewColumn('kota_kabupaten', 'kota_kabupaten', 'Kota Kabupaten', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddPrintColumn($column);
            
            //
            // View column for kode_pos field
            //
            $column = new NumberViewColumn('kode_pos', 'kode_pos', 'Kode Pos', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for tempat_lahir field
            //
            $column = new TextViewColumn('tempat_lahir', 'tempat_lahir', 'Tempat Lahir', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddPrintColumn($column);
            
            //
            // View column for tanggal_lahir field
            //
            $column = new DateTimeViewColumn('tanggal_lahir', 'tanggal_lahir', 'Tanggal Lahir', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('Y-m-d');
            $grid->AddPrintColumn($column);
            
            //
            // View column for golongan_darah field
            //
            $column = new TextViewColumn('golongan_darah', 'golongan_darah', 'Golongan Darah', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddPrintColumn($column);
            
            //
            // View column for nisn field
            //
            $column = new NumberViewColumn('nisn', 'nisn', 'Nisn', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for nik field
            //
            $column = new NumberViewColumn('nik', 'nik', 'Nik', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for nomor_tlp_wa field
            //
            $column = new TextViewColumn('nomor_tlp_wa', 'nomor_tlp_wa', 'Nomor Tlp Wa', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for anak_ke field
            //
            $column = new NumberViewColumn('anak_ke', 'anak_ke', 'Anak Ke', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for jumlah_saudara field
            //
            $column = new NumberViewColumn('jumlah_saudara', 'jumlah_saudara', 'Jumlah Saudara', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for asal_sekolah field
            //
            $column = new TextViewColumn('asal_sekolah', 'asal_sekolah', 'Asal Sekolah', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddPrintColumn($column);
            
            //
            // View column for asal_kotakab field
            //
            $column = new TextViewColumn('asal_kotakab', 'asal_kotakab', 'Asal Kotakab', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddPrintColumn($column);
            
            //
            // View column for user_status field
            //
            $column = new NumberViewColumn('user_status', 'user_status', 'User Status', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for tanggal_update field
            //
            $column = new DateTimeViewColumn('tanggal_update', 'tanggal_update', 'Tanggal Update', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $grid->AddPrintColumn($column);
            
            //
            // View column for dokumen_kk field
            //
            $column = new DownloadDataColumn('dokumen_kk', 'dokumen_kk', 'Dokumen Kk', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for dokumen_akte_kelahiran field
            //
            $column = new DownloadDataColumn('dokumen_akte_kelahiran', 'dokumen_akte_kelahiran', 'Dokumen Akte Kelahiran', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for dokumen_pas_foto field
            //
            $column = new DownloadDataColumn('dokumen_pas_foto', 'dokumen_pas_foto', 'Dokumen Pas Foto', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for siswa_id field
            //
            $column = new NumberViewColumn('siswa_id', 'siswa_id', 'Siswa Id', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for kelas_id field
            //
            $column = new TextViewColumn('kelas_id', 'kelas_id', 'Kelas Id', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for nis field
            //
            $column = new NumberViewColumn('nis', 'nis', 'Nis', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for user_name field
            //
            $column = new TextViewColumn('user_name', 'user_name', 'User Name', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddExportColumn($column);
            
            //
            // View column for user_email field
            //
            $column = new TextViewColumn('user_email', 'user_email', 'User Email', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddExportColumn($column);
            
            //
            // View column for nama field
            //
            $column = new TextViewColumn('nama', 'nama', 'Nama', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddExportColumn($column);
            
            //
            // View column for jenis_kelamin field
            //
            $column = new TextViewColumn('jenis_kelamin', 'jenis_kelamin', 'Jenis Kelamin', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for nama_ayah_wali field
            //
            $column = new TextViewColumn('nama_ayah_wali', 'nama_ayah_wali', 'Nama Ayah Wali', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddExportColumn($column);
            
            //
            // View column for no_ktp_ayah field
            //
            $column = new NumberViewColumn('no_ktp_ayah', 'no_ktp_ayah', 'No Ktp Ayah', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for nama_ibu field
            //
            $column = new TextViewColumn('nama_ibu', 'nama_ibu', 'Nama Ibu', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddExportColumn($column);
            
            //
            // View column for alamat field
            //
            $column = new TextViewColumn('alamat', 'alamat', 'Alamat', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddExportColumn($column);
            
            //
            // View column for rt field
            //
            $column = new NumberViewColumn('rt', 'rt', 'Rt', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for rw field
            //
            $column = new NumberViewColumn('rw', 'rw', 'Rw', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for kelurahan_desa field
            //
            $column = new TextViewColumn('kelurahan_desa', 'kelurahan_desa', 'Kelurahan Desa', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddExportColumn($column);
            
            //
            // View column for kecamatan field
            //
            $column = new TextViewColumn('kecamatan', 'kecamatan', 'Kecamatan', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddExportColumn($column);
            
            //
            // View column for kota_kabupaten field
            //
            $column = new TextViewColumn('kota_kabupaten', 'kota_kabupaten', 'Kota Kabupaten', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddExportColumn($column);
            
            //
            // View column for kode_pos field
            //
            $column = new NumberViewColumn('kode_pos', 'kode_pos', 'Kode Pos', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for tempat_lahir field
            //
            $column = new TextViewColumn('tempat_lahir', 'tempat_lahir', 'Tempat Lahir', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddExportColumn($column);
            
            //
            // View column for tanggal_lahir field
            //
            $column = new DateTimeViewColumn('tanggal_lahir', 'tanggal_lahir', 'Tanggal Lahir', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('Y-m-d');
            $grid->AddExportColumn($column);
            
            //
            // View column for golongan_darah field
            //
            $column = new TextViewColumn('golongan_darah', 'golongan_darah', 'Golongan Darah', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddExportColumn($column);
            
            //
            // View column for nisn field
            //
            $column = new NumberViewColumn('nisn', 'nisn', 'Nisn', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for nik field
            //
            $column = new NumberViewColumn('nik', 'nik', 'Nik', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for nomor_tlp_wa field
            //
            $column = new TextViewColumn('nomor_tlp_wa', 'nomor_tlp_wa', 'Nomor Tlp Wa', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for anak_ke field
            //
            $column = new NumberViewColumn('anak_ke', 'anak_ke', 'Anak Ke', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for jumlah_saudara field
            //
            $column = new NumberViewColumn('jumlah_saudara', 'jumlah_saudara', 'Jumlah Saudara', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for asal_sekolah field
            //
            $column = new TextViewColumn('asal_sekolah', 'asal_sekolah', 'Asal Sekolah', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddExportColumn($column);
            
            //
            // View column for asal_kotakab field
            //
            $column = new TextViewColumn('asal_kotakab', 'asal_kotakab', 'Asal Kotakab', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddExportColumn($column);
            
            //
            // View column for user_status field
            //
            $column = new NumberViewColumn('user_status', 'user_status', 'User Status', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for tanggal_update field
            //
            $column = new DateTimeViewColumn('tanggal_update', 'tanggal_update', 'Tanggal Update', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $grid->AddExportColumn($column);
            
            //
            // View column for dokumen_kk field
            //
            $column = new DownloadDataColumn('dokumen_kk', 'dokumen_kk', 'Dokumen Kk', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for dokumen_akte_kelahiran field
            //
            $column = new DownloadDataColumn('dokumen_akte_kelahiran', 'dokumen_akte_kelahiran', 'Dokumen Akte Kelahiran', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for dokumen_pas_foto field
            //
            $column = new DownloadDataColumn('dokumen_pas_foto', 'dokumen_pas_foto', 'Dokumen Pas Foto', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for siswa_id field
            //
            $column = new NumberViewColumn('siswa_id', 'siswa_id', 'Siswa Id', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
        }
    
        private function AddCompareColumns(Grid $grid)
        {
            //
            // View column for kelas_id field
            //
            $column = new TextViewColumn('kelas_id', 'kelas_id', 'Kelas Id', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for nis field
            //
            $column = new NumberViewColumn('nis', 'nis', 'Nis', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for user_name field
            //
            $column = new TextViewColumn('user_name', 'user_name', 'User Name', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddCompareColumn($column);
            
            //
            // View column for user_email field
            //
            $column = new TextViewColumn('user_email', 'user_email', 'User Email', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddCompareColumn($column);
            
            //
            // View column for nama field
            //
            $column = new TextViewColumn('nama', 'nama', 'Nama', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddCompareColumn($column);
            
            //
            // View column for jenis_kelamin field
            //
            $column = new TextViewColumn('jenis_kelamin', 'jenis_kelamin', 'Jenis Kelamin', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for nama_ayah_wali field
            //
            $column = new TextViewColumn('nama_ayah_wali', 'nama_ayah_wali', 'Nama Ayah Wali', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddCompareColumn($column);
            
            //
            // View column for no_ktp_ayah field
            //
            $column = new NumberViewColumn('no_ktp_ayah', 'no_ktp_ayah', 'No Ktp Ayah', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for nama_ibu field
            //
            $column = new TextViewColumn('nama_ibu', 'nama_ibu', 'Nama Ibu', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddCompareColumn($column);
            
            //
            // View column for alamat field
            //
            $column = new TextViewColumn('alamat', 'alamat', 'Alamat', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddCompareColumn($column);
            
            //
            // View column for rt field
            //
            $column = new NumberViewColumn('rt', 'rt', 'Rt', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for rw field
            //
            $column = new NumberViewColumn('rw', 'rw', 'Rw', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for kelurahan_desa field
            //
            $column = new TextViewColumn('kelurahan_desa', 'kelurahan_desa', 'Kelurahan Desa', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddCompareColumn($column);
            
            //
            // View column for kecamatan field
            //
            $column = new TextViewColumn('kecamatan', 'kecamatan', 'Kecamatan', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddCompareColumn($column);
            
            //
            // View column for kota_kabupaten field
            //
            $column = new TextViewColumn('kota_kabupaten', 'kota_kabupaten', 'Kota Kabupaten', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddCompareColumn($column);
            
            //
            // View column for kode_pos field
            //
            $column = new NumberViewColumn('kode_pos', 'kode_pos', 'Kode Pos', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for tempat_lahir field
            //
            $column = new TextViewColumn('tempat_lahir', 'tempat_lahir', 'Tempat Lahir', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddCompareColumn($column);
            
            //
            // View column for tanggal_lahir field
            //
            $column = new DateTimeViewColumn('tanggal_lahir', 'tanggal_lahir', 'Tanggal Lahir', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('Y-m-d');
            $grid->AddCompareColumn($column);
            
            //
            // View column for golongan_darah field
            //
            $column = new TextViewColumn('golongan_darah', 'golongan_darah', 'Golongan Darah', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddCompareColumn($column);
            
            //
            // View column for nisn field
            //
            $column = new NumberViewColumn('nisn', 'nisn', 'Nisn', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for nik field
            //
            $column = new NumberViewColumn('nik', 'nik', 'Nik', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for nomor_tlp_wa field
            //
            $column = new TextViewColumn('nomor_tlp_wa', 'nomor_tlp_wa', 'Nomor Tlp Wa', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for anak_ke field
            //
            $column = new NumberViewColumn('anak_ke', 'anak_ke', 'Anak Ke', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for jumlah_saudara field
            //
            $column = new NumberViewColumn('jumlah_saudara', 'jumlah_saudara', 'Jumlah Saudara', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for asal_sekolah field
            //
            $column = new TextViewColumn('asal_sekolah', 'asal_sekolah', 'Asal Sekolah', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddCompareColumn($column);
            
            //
            // View column for asal_kotakab field
            //
            $column = new TextViewColumn('asal_kotakab', 'asal_kotakab', 'Asal Kotakab', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddCompareColumn($column);
            
            //
            // View column for user_status field
            //
            $column = new NumberViewColumn('user_status', 'user_status', 'User Status', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for tanggal_update field
            //
            $column = new DateTimeViewColumn('tanggal_update', 'tanggal_update', 'Tanggal Update', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $grid->AddCompareColumn($column);
            
            //
            // View column for dokumen_kk field
            //
            $column = new DownloadDataColumn('dokumen_kk', 'dokumen_kk', 'Dokumen Kk', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for dokumen_akte_kelahiran field
            //
            $column = new DownloadDataColumn('dokumen_akte_kelahiran', 'dokumen_akte_kelahiran', 'Dokumen Akte Kelahiran', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for dokumen_pas_foto field
            //
            $column = new DownloadDataColumn('dokumen_pas_foto', 'dokumen_pas_foto', 'Dokumen Pas Foto', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for siswa_id field
            //
            $column = new NumberViewColumn('siswa_id', 'siswa_id', 'Siswa Id', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
        }
    
        private function AddCompareHeaderColumns(Grid $grid)
        {
    
        }
    
        public function GetPageDirection()
        {
            return null;
        }
    
        public function isFilterConditionRequired()
        {
            return false;
        }
    
        protected function ApplyCommonColumnEditProperties(CustomEditColumn $column)
        {
            $column->SetDisplaySetToNullCheckBox(false);
            $column->SetDisplaySetToDefaultCheckBox(false);
    		$column->SetVariableContainer($this->GetColumnVariableContainer());
        }
    
        function GetCustomClientScript()
        {
            return ;
        }
        
        function GetOnPageLoadedClientScript()
        {
            return ;
        }
        protected function GetEnableModalGridDelete() { return true; }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset);
            if ($this->GetSecurityInfo()->HasDeleteGrant())
               $result->SetAllowDeleteSelected(true);
            else
               $result->SetAllowDeleteSelected(false);   
            
            ApplyCommonPageSettings($this, $result);
            
            $result->SetUseImagesForActions(true);
            $result->SetUseFixedHeader(false);
            $result->SetShowLineNumbers(false);
            $result->SetShowKeyColumnsImagesInHeader(false);
            $result->SetViewMode(ViewMode::TABLE);
            $result->setEnableRuntimeCustomization(true);
            $result->setMultiEditAllowed($this->GetSecurityInfo()->HasEditGrant() && true);
            $result->setTableBordered(false);
            $result->setTableCondensed(false);
            
            $result->SetHighlightRowAtHover(true);
            $result->SetWidth('');
    
            $this->AddFieldColumns($result);
            $this->AddSingleRecordViewColumns($result);
            $this->AddEditColumns($result);
            $this->AddMultiEditColumns($result);
            $this->AddInsertColumns($result);
            $this->AddPrintColumns($result);
            $this->AddExportColumns($result);
            $this->AddMultiUploadColumn($result);
    
            $this->AddOperationsColumns($result);
            $this->SetShowPageList(true);
            $this->SetShowTopPageNavigator(true);
            $this->SetShowBottomPageNavigator(true);
            $this->setPrintListAvailable(true);
            $this->setPrintListRecordAvailable(false);
            $this->setPrintOneRecordAvailable(true);
            $this->setAllowPrintSelectedRecords(true);
            $this->setExportListAvailable(array('pdf', 'excel', 'word'));
            $this->setExportSelectedRecordsAvailable(array('pdf', 'excel', 'word'));
            $this->setExportListRecordAvailable(array());
            $this->setExportOneRecordAvailable(array('pdf', 'excel', 'word'));
    
            return $result;
        }
     
        protected function setClientSideEvents(Grid $grid) {
    
        }
    
        protected function doRegisterHandlers() {
            $handler = new DownloadHTTPHandler($this->dataset, 'dokumen_kk', 'dokumen_kk_handler', '', '', true);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $handler = new DownloadHTTPHandler($this->dataset, 'dokumen_akte_kelahiran', 'dokumen_akte_kelahiran_handler', '', '', true);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $handler = new DownloadHTTPHandler($this->dataset, 'dokumen_pas_foto', 'dokumen_pas_foto_handler', '', '', true);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $handler = new DownloadHTTPHandler($this->dataset, 'dokumen_kk', 'dokumen_kk_handler', '', '', true);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $handler = new DownloadHTTPHandler($this->dataset, 'dokumen_akte_kelahiran', 'dokumen_akte_kelahiran_handler', '', '', true);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $handler = new DownloadHTTPHandler($this->dataset, 'dokumen_pas_foto', 'dokumen_pas_foto_handler', '', '', true);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $handler = new DownloadHTTPHandler($this->dataset, 'dokumen_kk', 'dokumen_kk_handler', '', '', true);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $handler = new DownloadHTTPHandler($this->dataset, 'dokumen_akte_kelahiran', 'dokumen_akte_kelahiran_handler', '', '', true);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $handler = new DownloadHTTPHandler($this->dataset, 'dokumen_pas_foto', 'dokumen_pas_foto_handler', '', '', true);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $handler = new ImageHTTPHandler($this->dataset, 'dokumen_kk', 'siswa_users_dokumen_kk_handler_insert', new NullFilter());
            GetApplication()->RegisterHTTPHandler($handler);
            
            $handler = new ImageHTTPHandler($this->dataset, 'dokumen_akte_kelahiran', 'siswa_users_dokumen_akte_kelahiran_handler_insert', new NullFilter());
            GetApplication()->RegisterHTTPHandler($handler);
            
            $handler = new ImageHTTPHandler($this->dataset, 'dokumen_pas_foto', 'siswa_users_dokumen_pas_foto_handler_insert', new NullFilter());
            GetApplication()->RegisterHTTPHandler($handler);
            
            $handler = new DownloadHTTPHandler($this->dataset, 'dokumen_kk', 'dokumen_kk_handler', '', '', true);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $handler = new DownloadHTTPHandler($this->dataset, 'dokumen_akte_kelahiran', 'dokumen_akte_kelahiran_handler', '', '', true);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $handler = new DownloadHTTPHandler($this->dataset, 'dokumen_pas_foto', 'dokumen_pas_foto_handler', '', '', true);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $handler = new ImageHTTPHandler($this->dataset, 'dokumen_kk', 'siswa_users_dokumen_kk_handler_edit', new NullFilter());
            GetApplication()->RegisterHTTPHandler($handler);
            
            $handler = new ImageHTTPHandler($this->dataset, 'dokumen_akte_kelahiran', 'siswa_users_dokumen_akte_kelahiran_handler_edit', new NullFilter());
            GetApplication()->RegisterHTTPHandler($handler);
            
            $handler = new ImageHTTPHandler($this->dataset, 'dokumen_pas_foto', 'siswa_users_dokumen_pas_foto_handler_edit', new NullFilter());
            GetApplication()->RegisterHTTPHandler($handler);
            
            $handler = new ImageHTTPHandler($this->dataset, 'dokumen_kk', 'siswa_users_dokumen_kk_handler_multi_edit', new NullFilter());
            GetApplication()->RegisterHTTPHandler($handler);
            
            $handler = new ImageHTTPHandler($this->dataset, 'dokumen_akte_kelahiran', 'siswa_users_dokumen_akte_kelahiran_handler_multi_edit', new NullFilter());
            GetApplication()->RegisterHTTPHandler($handler);
            
            $handler = new ImageHTTPHandler($this->dataset, 'dokumen_pas_foto', 'siswa_users_dokumen_pas_foto_handler_multi_edit', new NullFilter());
            GetApplication()->RegisterHTTPHandler($handler);
        }
       
        protected function doCustomRenderColumn($fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomRenderPrintColumn($fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomRenderExportColumn($exportType, $fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomDrawRow($rowData, &$cellFontColor, &$cellFontSize, &$cellBgColor, &$cellItalicAttr, &$cellBoldAttr)
        {
    
        }
    
        protected function doExtendedCustomDrawRow($rowData, &$rowCellStyles, &$rowStyles, &$rowClasses, &$cellClasses)
        {
    
        }
    
        protected function doCustomRenderTotal($totalValue, $aggregate, $columnName, &$customText, &$handled)
        {
    
        }
    
        protected function doCustomDefaultValues(&$values, &$handled) 
        {
    
        }
    
        protected function doCustomCompareColumn($columnName, $valueA, $valueB, &$result)
        {
    
        }
    
        protected function doBeforeInsertRecord($page, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doBeforeUpdateRecord($page, $oldRowData, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doBeforeDeleteRecord($page, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterInsertRecord($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterUpdateRecord($page, $oldRowData, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterDeleteRecord($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doCustomHTMLHeader($page, &$customHtmlHeaderText)
        { 
    
        }
    
        protected function doGetCustomTemplate($type, $part, $mode, &$result, &$params)
        {
    
        }
    
        protected function doGetCustomExportOptions(Page $page, $exportType, $rowData, &$options)
        {
    
        }
    
        protected function doFileUpload($fieldName, $rowData, &$result, &$accept, $originalFileName, $originalFileExtension, $fileSize, $tempFileName)
        {
    
        }
    
        protected function doPrepareChart(Chart $chart)
        {
    
        }
    
        protected function doPrepareColumnFilter(ColumnFilter $columnFilter)
        {
    
        }
    
        protected function doPrepareFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
    
        }
    
        protected function doGetSelectionFilters(FixedKeysArray $columns, &$result)
        {
    
        }
    
        protected function doGetCustomFormLayout($mode, FixedKeysArray $columns, FormLayout $layout)
        {
    
        }
    
        protected function doGetCustomColumnGroup(FixedKeysArray $columns, ViewColumnGroup $columnGroup)
        {
    
        }
    
        protected function doPageLoaded()
        {
    
        }
    
        protected function doCalculateFields($rowData, $fieldName, &$value)
        {
    
        }
    
        protected function doGetCustomRecordPermissions(Page $page, &$usingCondition, $rowData, &$allowEdit, &$allowDelete, &$mergeWithDefault, &$handled)
        {
    
        }
    
        protected function doAddEnvironmentVariables(Page $page, &$variables)
        {
    
        }
    
    }

    SetUpUserAuthorization();

    try
    {
        $Page = new siswa_usersPage("siswa_users", "siswa_users.php", GetCurrentUserPermissionsForPage("siswa_users"), 'UTF-8');
        $Page->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource("siswa_users"));
        GetApplication()->SetMainPage($Page);
        GetApplication()->Run();
    }
    catch(Exception $e)
    {
        ShowErrorPage($e);
    }
	
