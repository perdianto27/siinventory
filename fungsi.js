function tampil(id)
{
	document.getElementById(id).style.visibility="visible";
}
function sembunyi(id)
{
	document.getElementById(id).style.visibility="hidden";
}

function hapus(){
	if(confirm('Anda Yakin Akan Menghapus Data?'))
	{
		return true;
	}
	else
	{
		return false;
	}
}

function keluar(){
	if(confirm('Anda Yakin Akan Keluar Dari Aplikasi?'))
	{
		return true;
	}
	else
	{
		return false;
	}
}
function salah(){
	if(confirm('Sandi Yang Anda Masukan salah!'))
	{
		return true;
	}
	else
	{
		return false;
	}
}