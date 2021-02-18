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
										Kategori
									</th>
									<th scope="col">
										File PDF
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
                                    $query = "SELECT * FROM buku_paket WHERE kategori LIKE ? AND (judul LIKE ? OR pengarang LIKE ? OR kategori LIKE ? OR file_buku LIKE ? OR gambar_buku LIKE ?) ORDER BY id DESC LIMIT 500";
                                    $jijon = $db1->prepare($query);
                                    $jijon->bind_param('ssssss', $search_kategori, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword);
                                    $jijon->execute();
                                    $res1 = $jijon->get_result();

                                    if ($res1->num_rows > 0) {
                                        while ($row = $res1->fetch_assoc()) {
                                            $id = $row['id'];
                                            $judul = $row['judul'];
                                            $pengarang = $row['pengarang'];
                                            $kategori = $row['kategori'];
                                            $file_buku = $row['file_buku'];
                                            $gambar_buku = $row['gambar_buku'];
                            ?>
								<tr>
									<td><?php echo $judul; ?></td>
									<td><?php echo $pengarang; ?></td>
									<td><?php echo $kategori; ?></td>
									<td><a href="admin/file_pdf_buku/viewpdf.php?file_name=<?php echo $file_buku;?>" target="_blank"> View Pdf</a></td>
                                </tr>
                                <?php } } else { ?> 
                                <tr>
                                    <td scope="col">Tidak ada data ditemukan</td>
                                </tr>
                            <?php } ?>
							</tbody>
						</table>