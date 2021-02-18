                <table class="table-striped">
							<thead>
								<tr class="domain-head">
									<th scope="col">
										Judul
									</th>
									<th scope="col">
										Pengarang
									</th>
									<th scope="col">
										penerbit & tempat terbit
									</th>
                                    <th scope="col">
										ISBN
									</th>
                                    <th scope="col">
										Jumlah 
                                        <br>halaman
									</th>
                                    <th scope="col">
										Kategori
									</th>
									<th scope="col">
										File
									</th>
								</tr>
							</thead>
							<tbody>
                            <?php
                                    include "/conn.php";
                                    $s_kategori="";
                                    $s_keyword="";
                                    if (isset($_POST['kategori'])) {
                                        $s_kategori = $_POST['kategori'];
                                        $s_keyword = $_POST['keyword'];
                                    }
                                    
                                    $search_kategori = '%'. $s_kategori .'%';
                                    $search_keyword = '%'. $s_keyword .'%';
                                    $no = 1;
                                    $query = "SELECT * FROM data_ebook WHERE kategori LIKE ? AND (judul LIKE ? OR pengarang LIKE ? OR tempatdanpenerbit LIKE ? OR isbn LIKE ? OR jumlahhalaman LIKE ? OR kategori LIKE ? OR file_ebook LIKE ? OR gambar_ebook LIKE ?) ORDER BY id DESC LIMIT 500";
                                    $jijon = $db1->prepare($query);
                                    $jijon->bind_param('sssssssss', $search_kategori, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword);
                                    $jijon->execute();
                                    $res1 = $jijon->get_result();

                                    if ($res1->num_rows > 0) {
                                        while ($row = $res1->fetch_assoc()) {
                                            $id = $row['id'];
                                            $judul = $row['judul'];
                                            $pengarang = $row['pengarang'];
                                            $tempatdanpenerbit = $row['tempatdanpenerbit'];
                                            $isbn   = $row['isbn'];
                                            $jumlahhalaman = $row['jumlahhalaman'];
                                            $kategori = $row['kategori'];
                                            $file_ebook = $row['file_ebook'];
                                            $gambar_ebook = $row['gambar_ebook'];
                            ?>
								<tr>
									<td><?php echo $judul; ?></td>
									<td><?php echo $pengarang; ?></td>
                                    <td><?php echo $tempatdanpenerbit; ?></td>
                                    <td><?php echo $isbn; ?></td>
                                    <td><?php echo $jumlahhalaman; ?></td>
									<td><?php echo $kategori; ?></td>
									<td><a href="admin/file_pdf/viewpdf.php?file_name=<?php echo $file_ebook;?>" target="_blank"> Buka Pdf</a></td>
                                </tr>
                                <?php } } else { ?> 
                                <tr>
                                    <td colspan="7">Tidak ada data ditemukan</td>
                                </tr>
                            <?php } ?>
							</tbody>
						</table>